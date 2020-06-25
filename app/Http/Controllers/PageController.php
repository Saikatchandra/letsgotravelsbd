<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;

class PageController extends Controller
{
    public function showAllPages()
    {
        $items = Page::get();
        return view('page.showAllPages')->with('items', $items);
    }

    public function createPage()
    {
        return view('page.createPage');
    }

    public function createPagePost(Request $request)
    {
        $request->validate([
            'slug'=> 'required|unique:pages|max:190|regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/',
            'title'=> 'required|max:30',
            'description'=> 'required',
        ],
        [
            'slug.unique' => 'The slug has to be unique',
        ]
    
        );
        // dd($request->all());
        $item = new Page;
        $item->slug = $request->slug;
        $item->title = $request->title;
        $item->description = $request->description;
        $item->save();
        return redirect()->action('PageController@showAllPages');
    }

    public function editPage($id)
    {
        $item = Page::find($id);
        // dd($item);
        return view('page.editPage')->with('item', $item);
    }

    public function editPagePost(Request $request)
    {
        $request->validate([
            'slug'=> 'required|max:190|unique:pages,slug,'.$request->id.'|max:190|regex:/^[a-zA-Z0-9-]+$/',
            'title'=> 'required|max:30',
            'description'=> 'required',
        ]);
        // dd($request->all());
        $item = Page::find($request->id);
        $item->slug = $request->slug;
        $item->title = $request->title;
        $item->description = $request->description;
        $item->save();
        return redirect()->action('PageController@showAllPages');
    }

    public function deletePage(Request $request)
    {
        // return($request->id);
        // dd($request->id);
        $item = Page::find($request->id);
        $item->delete();

        $items = Page::get();
        // dd($slider);
        return view('ajax.updatedSlugs')->with('items', $items);
    }

    public function hitCustomPage($slug)
    {
        $item = Page::where('slug', $slug)->first();
        // dd($item);
        if($item != null)
        {
            return view("page.customPage")->with('item', $item);
        }
        else
        {
            return view("404");
        }
    }

    public function fetchSlug()
    {
        $item = Page::select('slug', 'title')->get();
        return $item;
    }
}
