<?php

namespace App\Http\Controllers;

use App\Models\Announce;
use App\Models\Category;
use App\Jobs\ResizeImage;
use Illuminate\Http\Request;
use App\Models\AnnounceImage;
use App\Jobs\GoogleVisionLabelImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Jobs\GoogleVisionRemoveFaces;
use App\Http\Requests\AnnounceRequest;
use Illuminate\Support\Facades\Storage;
use App\Jobs\GoogleVisionSafeSearchImage;

class AnnounceController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('index', 'home');
    }

    public function create(Request $request) {
        $uniqueSecret = $request->old('uniqueSecret', base_convert(sha1(uniqid(mt_rand())), 16, 36));
        return view('announce.create', compact('uniqueSecret'));
    }



    public function store(AnnounceRequest $request) {
        $announce = Announce::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category,
            'user_id'=> Auth::user()->id,
        ]);

        $uniqueSecret = $request->input('uniqueSecret');

        $images = session()->get("images.{$uniqueSecret}", []);
        $removedImages = session()->get("removedImages.{$uniqueSecret}", []);
        $images = array_diff($images, $removedImages);

        foreach ($images as $image) {
            $i = new AnnounceImage();

            $fileName = basename($image);
            $newFileName = "public/announces/{$announce->id}/{$fileName}";
            Storage::move($image, $newFileName);


            $i->file = $newFileName;
            $i->announce_id = $announce->id;

            $i->save();
            
            
            GoogleVisionSafeSearchImage::withChain([
                new GoogleVisionRemoveFaces($i->id),
                new GoogleVisionLabelImage($i->id),
                new ResizeImage($i->file, 400, 200),
                new ResizeImage($i->file, 1000, 1000)
            ])->dispatch($i->id);
        }

        File::deleteDirectory(storage_path("/app/public/temp/{$uniqueSecret}"));

        return redirect(route('announce.index'))->with('flash', 'Hai correttamente inserito l\'annuncio');
    }



    public function index() {
        $announces = Announce::all();
        return view ('announce.index', compact('announces'));
    }



    public function uploadImage(Request $request) {
        $uniqueSecret = $request->input('uniqueSecret');

        $fileName = $request->file('file')->store("public/temp/{$uniqueSecret}");

        dispatch(new ResizeImage(
            $fileName,
            120,
            120
        ));

        session()->push("images.{$uniqueSecret}", $fileName);

        return response()->json(
            [
                'id' => $fileName
                ]
            );
        }



        public function removeImages(Request $request) {
            $uniqueSecret = $request->input('uniqueSecret');
            $fileName = $request->input('id');
            session()->push("removedImages.{$uniqueSecret}", $fileName);
            Storage::delete($fileName);

            return response()->json('ok');
        }



        public function getImages(Request $request) {
            $uniqueSecret = $request->input('uniqueSecret');
            $images = session()->get("images.{$uniqueSecret}", []);
            $removedImages = session()->get("removedImages.{$uniqueSecret}", []);
            $images = array_diff($images, $removedImages);
            $data = [];

            foreach($images as $image) {
                $data[] = [
                    'id' => $image,
                    'src' => AnnounceImage::getUrlByFilePath($image, 120, 120)
                ];
            }

            return response()->json($data);
        }
    }