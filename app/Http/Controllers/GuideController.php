<?php

namespace App\Http\Controllers;

use App\Models\Guide;
use App\Models\Nice;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;
class GuideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guides = Guide::paginate(10);
        return view('dashboard.guide.index', compact('guides'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.guide.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'content' => 'required',
            'image' => 'required',
            'homeimage' => 'required',
        ]);


        $homeImage = $request->file('homeimage');
        $homeImageName = Str::slug($request->title) . '.' . $homeImage->getClientOriginalExtension();
        $homeImage->move(public_path('images/homeimages'), $homeImageName);


        $image = $request->file('image');
        $imageName = Str::slug($request->title) . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);


        Guide::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'content' => $request->content,
            'image' => $imageName,
            'homeimage' => $homeImageName,

        ]);
        return redirect()->route('guide.index')->with('success', 'Guide created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Guide  $guide
     * @return \Illuminate\Http\Response
     */
    public function show(Guide $guide)
    {
        return view('dashboard.guide.show', compact('guide'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Guide  $guide
     * @return \Illuminate\Http\Response
     */
    public function edit(Guide $guide)
    {
        return view('dashboard.guide.edit', compact('guide'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Guide  $guide
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guide $guide)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'content' => 'required',
        ]);

        if ($request->hasFile('image')) {
            if ($guide->image) {
                if (file_exists(public_path('images/' . $guide->image))) {
                    unlink(public_path('images/' . $guide->image));
                }
            }
            $image = $request->file('image');
            $imageName = Str::slug($request->title) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $guide->image = $imageName;
        } else {
            $imageName = Str::slug($request->title) . '.webp';
            rename(public_path('images/' . $guide->image), public_path('images/' . $imageName));
            $guide->image = $imageName;
        }

        if ($request->hasFile('homeimage')) {
            if ($guide->homeimage) {
                if (file_exists(public_path('images/homeimages' . $guide->homeimage))) {
                    unlink(public_path('images/homeimages' . $guide->homeimage));
                }
            }
            $homeImage = $request->file('homeimage');
            $homeImageName = Str::slug($request->title) . '.' . $homeImage->getClientOriginalExtension();
            $homeImage->move(public_path('images/homeimages'), $homeImageName);
            $guide->homeImage = $homeImageName;
        } else {
            $homeImageName = Str::slug($request->title) . '.webp';
            rename(public_path('images/homeimages' . $guide->homeimage), public_path('images/homeimages' . $homeImageName));
            $guide->homeimage = $homeImageName;
        }

        $guide->title = $request->title;
        $guide->slug = Str::slug($request->title);
        $guide->description = $request->description;
        $guide->content = $request->content;
        $guide->save();

        return redirect()->route('guide.index')->with('success', 'Guide updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Guide  $guide
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guide $guide)
    {
        $guide->delete();
        $file_path = public_path('images/' . $guide->image);
        if (file_exists($file_path)) {
            unlink($file_path);
        }
        return redirect()->route('guide.index')->with('success', 'Guide deleted successfully');
    }

    public function liveSearch(Request $request)
    {
        $query = $request->get('keyword');
        if ($query != '') {
            $guides = Guide::where('title', 'like', '%' . $query . '%')
                ->paginate(6);
        } else {
            $guides = DB::table('guides')
                ->select('id','title','slug','description','image')->paginate(6);
        }
        return response()->json($guides);
    }

    public function nice_class(Request $request){
        $query = $request->get('keyword');
        if($query !='') {
            $nice_class = Nice::where('content', 'like', '%' . $query . '%')->get();
        }
        else{
            $nice_class = Nice::all();
        }
        return response()->json($nice_class);
    }
}
