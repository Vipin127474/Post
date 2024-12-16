<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\blog;
class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index(Request $request)
    // {
    //     // Get filters from request
    //     $category = $request->input('category');
    //     $search = $request->input('search');
    
    //     // Initialize the query
    //     $query = blog::query();
    
    //     // Apply search filter if present
    //     if ($search) {
    //         $query->where('post_name', 'like', '%' . $search . '%');
    //     }
    
    //     // Apply category filter if present
    //     if ($category) {
    //         $query->where('category', $category);
    //     }
    
    //     // Paginate the result (adjust the number of items per page as needed)
    //     $blogs = $query->simplepaginate(3); // Pagination for both filtered and non-filtered results
    
    //     $categories = blog::select('category')->distinct()->get();

    //     // Return view with paginated results
    //     return view('blogs', compact('blogs', 'search', 'category', 'categories'));
    // }
    public function index(Request $request)
    {
        // Get filters from request
        $category = $request->input('category');
        $search = $request->input('search');
        $type = $request->input('type'); // 'own' or 'others'

        // Initialize the query
        $query = Blog::query();

        // Apply search filter if present
        if ($search) {
            $query->where('post_name', 'like', '%' . $search . '%');
        }

        // Apply category filter if present
        if ($category) {
            $query->where('category', $category);
        }

        // Filter based on the 'type' parameter
        if ($type === 'own') {
            $query->where('user_id', auth()->id()); // Show only the user's blogs
        } 
        // else {
        //     $query->where('user_id', '!=', auth()->id()); // Show only others' blogs
        // }
        $blogs = $query->simplePaginate(3); // all blogs
        $categories = Blog::select('category')->distinct()->get();

        // Paginate the result

        // Return view with paginated results
        return view('blogs', compact('blogs', 'search', 'category', 'categories', 'type'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addblog');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'post_name' => 'required',
            'post_desc' => 'required',
            'post_image' => 'required|mimes:png,jpg,jpeg|max:2048', // Optional: add max size limit
            'category' => 'required'
        ]);
    
        // Handle the file upload
        $file = $request->file('post_image');
        $filename = time() . '_' . $file->getClientOriginalName(); // Prevent filename collisions
        $file->move(public_path('uploads'), $filename);
        
        // Create the blog entry
        blog::create([
            'post_name' => $request->post_name,
            'post_desc' => $request->post_desc,
            'category' => $request->category,
            'post_image' => $filename,
            'user_id' => auth()->id(),
        ]);
   
        // \Log::info('Blog created successfully');
        // Redirect back with success message
        return redirect()->route('blogs.index');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $blog = blog::find($id);

        return view('show_blog', compact('blog'));
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $blog = blog::find($id);

        return view('editblog', compact('blog'));
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Step 1: Retrieve the blog post by ID
        $blog = blog::findOrFail($id);
    
        // Step 2: Validate the incoming request
        $request->validate([
            'post_name' => 'nullable',
            'post_desc' => 'nullable',
            'post_image' => 'nullable|mimes:png,jpg,jpeg|max:3000',
            'category' => 'nullable',
        ]);
    
        // Step 3: Check if a new image is uploaded
        if ($request->hasFile('post_image')) {
            // Handle the file upload
            $file = $request->file('post_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
    
            // Update the blog post image with the new file name
            $blog->post_image = $filename;
        }
    
        // Step 4: Update the blog post details
        $blog->post_name = $request->post_name;
        $blog->post_desc = $request->post_desc;
        $blog->category = $request->category;
    
        // Step 5: Save the updated blog post
        $blog->save();
    
        // Step 6: Redirect back with a success message
        return redirect()->route('blogs.index')->with('success', 'Blog post updated successfully!');
    }    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // $blogs=Blog::find($id);
        // $blogs->delete();

        blog::destroy($id);
        return redirect()->route('blogs.index');
    }
}
