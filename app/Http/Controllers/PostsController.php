<?php

namespace App\Http\Controllers;

use App\Models\Post;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    public function store(Request $request)
    {
        $user = Auth::user();
        $file = $request->file('file');
        $file1 = $request->file('file1');
        $file2 = $request->file('file2');
        $file3 = $request->file('file3');
        $file4 = $request->file('file4');
        if (isset($file) || isset($file1) || isset($file2) || isset($file3) || isset($file4)) {
            if ( ! file_exists(base_path() . '/public/uploads/posts')) {
                mkdir(base_path() . '/public/uploads/posts', 0777, true);
            }
            $currentDateTime = new DateTime();
            $currentDateTime = $currentDateTime->getTimestamp();
            $filename = null;
            $filename1 = null;
            $filename2 = null;
            $filename3 = null;
            $filename4 = null;
            if (isset($file)) {
                $filename = $currentDateTime . uniqid() . '.jpg';
                $file->move(base_path() . '/public/uploads/posts', $filename);
            }
            if (isset($file1)) {
                $filename1 = $currentDateTime . uniqid() . '.jpg';
                $file1->move(base_path() . '/public/uploads/posts', $filename1);
            }
            if (isset($file2)) {
                $filename2 = $currentDateTime . uniqid() . '.jpg';
                $file2->move(base_path() . '/public/uploads/posts', $filename2);
            }
            if (isset($file3)) {
                $filename3 = $currentDateTime . uniqid() . '.jpg';
                $file3->move(base_path() . '/public/uploads/posts', $filename3);
            }
            if (isset($file4)) {
                $filename4 = $currentDateTime . uniqid() . '.jpg';
                $file4->move(base_path() . '/public/uploads/posts', $filename4);
            }

            $post = Post::create([
                'created_by' => $user->id,
                'title' => $request->title,
                'description' => $request->description,
                'subject' => $request->subject,
                'address' => $request->address,
                'event_date' => $request->event_date,
                'featured_image_url' => $filename,
                'small_featured_image1_url' => $filename1,
                'small_featured_image2_url' => $filename2,
                'small_featured_image3_url' => $filename3,
                'small_featured_image4_url' => $filename4,
                'type' => $request->type,
            ]);

            return response()->json(['success' => 'Post successfully uploaded']);
        }

        $post = Post::create([
            'created_by' => $user->id,
            'title' => $request->title,
            'description' => $request->description,
            'address' => $request->address,
            'subject' => $request->subject,
            'type' => $request->type,
        ]);

        return response()->json(['success' => 'Post successfully uploaded']);
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $post = Post::find($request->id);
        $file = $request->file('file');
        $file1 = $request->file('file1');
        $file2 = $request->file('file2');
        $file3 = $request->file('file3');
        $file4 = $request->file('file4');
        if (isset($file) || isset($file1) || isset($file2) || isset($file3) || isset($file4)) {
            if ( ! file_exists(base_path() . '/public/uploads/posts')) {
                mkdir(base_path() . '/public/uploads/posts', 0777, true);
            }
            $currentDateTime = new DateTime();
            $currentDateTime = $currentDateTime->getTimestamp();
            $filename = null;
            $filename1 = null;
            $filename2 = null;
            $filename3 = null;
            $filename4 = null;
            if (isset($file)) {
                $filename = $post->featured_image_url ?? $currentDateTime . uniqid() . '.jpg';
                $file->move(base_path() . '/public/uploads/posts', $filename);
                $post->featured_image_url = $filename;
            }
            if (isset($file1)) {
                $filename1 = $post->small_featured_image1_url ?? $currentDateTime . uniqid() . '.jpg';
                $file1->move(base_path() . '/public/uploads/posts', $filename1);
                $post->small_featured_image1_url = $filename1;
            }
            if (isset($file2)) {
                $filename2 = $post->small_featured_image2_url ?? $currentDateTime . uniqid() . '.jpg';
                $file2->move(base_path() . '/public/uploads/posts', $filename2);
                $post->small_featured_image2_url = $filename2;
            }
            if (isset($file3)) {
                $filename3 = $post->small_featured_image3_url ?? $currentDateTime . uniqid() . '.jpg';
                $file3->move(base_path() . '/public/uploads/posts', $filename3);
                $post->small_featured_image3_url = $filename3;
            }
            if (isset($file4)) {
                $filename4 = $post->small_featured_image4_url ?? $currentDateTime . uniqid() . '.jpg';
                $file4->move(base_path() . '/public/uploads/posts', $filename4);
                $post->small_featured_image4_url = $filename4;
            }
        }
        if ('true' === $request->removeImage) {
            if ($post->featured_image_url && file_exists(base_path() . '/public/uploads/posts/' . $post->featured_image_url)) {
                unlink(base_path() . '/public/uploads/posts/' . $post->featured_image_url);
            }
            $post->featured_image_url = null;
        }
        if ('true' === $request->removeImage1) {
            if ($post->small_featured_image1_url && file_exists(base_path() . '/public/uploads/posts/' . $post->small_featured_image1_url)) {
                unlink(base_path() . '/public/uploads/posts/' . $post->small_featured_image1_url);
            }
            $post->small_featured_image1_url = null;
        }
        if ('true' === $request->removeImage2) {
            if ($post->small_featured_image2_url && file_exists(base_path() . '/public/uploads/posts/' . $post->small_featured_image2_url)) {
                unlink(base_path() . '/public/uploads/posts/' . $post->small_featured_image2_url);
            }
            $post->small_featured_image2_url = null;
        }
        if ('true' === $request->removeImage3) {
            if ($post->small_featured_image3_url && file_exists(base_path() . '/public/uploads/posts/' . $post->small_featured_image3_url)) {
                unlink(base_path() . '/public/uploads/posts/' . $post->small_featured_image3_url);
            }
            $post->small_featured_image3_url = null;
        }
        if ('true' === $request->removeImage4) {
            if ($post->small_featured_image4_url && file_exists(base_path() . '/public/uploads/posts/' . $post->small_featured_image4_url)) {
                unlink(base_path() . '/public/uploads/posts/' . $post->small_featured_image4_url);
            }
            $post->small_featured_image4_url = null;
        }

        $post->title = $request->title;
        $post->description = $request->description;
        $post->subject = $request->subject;
        $post->address = $request->address;
        $post->event_date = $request->event_date;
        $post->save();

        return response()->json(['success' => 'Post successfully updated']);
    }

    public function delete(Request $request)
    {
        $post = Post::find($request->id);
        if ($post->featured_image_url && file_exists(base_path() . '/public/uploads/posts/' . $post->featured_image_url)) {
            unlink(base_path() . '/public/uploads/posts/' . $post->featured_image_url);
        }
        if ($post->small_featured_image1_url && file_exists(base_path() . '/public/uploads/posts/' . $post->small_featured_image1_url)) {
            unlink(base_path() . '/public/uploads/posts/' . $post->small_featured_image1_url);
        }
        if ($post->small_featured_image2_url && file_exists(base_path() . '/public/uploads/posts/' . $post->small_featured_image2_url)) {
            unlink(base_path() . '/public/uploads/posts/' . $post->small_featured_image2_url);
        }
        if ($post->small_featured_image3_url && file_exists(base_path() . '/public/uploads/posts/' . $post->small_featured_image3_url)) {
            unlink(base_path() . '/public/uploads/posts/' . $post->small_featured_image3_url);
        }
        if ($post->small_featured_image4_url && file_exists(base_path() . '/public/uploads/posts/' . $post->small_featured_image4_url)) {
            unlink(base_path() . '/public/uploads/posts/' . $post->small_featured_image4_url);
        }
        $post->delete();

        return response()->json(['success' => 'Post Successfully Deleted']);
    }

    public function likes(Request $request)
    {
        $authUserId = Auth::user()->id;
        $post = Post::find($request->id);
        $followers = [];
        $like = true;
        if ($post->followers && count(explode(',', $post->followers)) > 0) {
            $followers = explode(',', $post->followers);
            if (in_array($authUserId, $followers)) {
                $index = array_search($authUserId, $followers);
                array_splice($followers, $index, 1);
                $like = false;
            } else {
                $followers[] = $authUserId;
            }
        } else {
            $followers[] = $authUserId;
        }
        $post->followers = implode(',', $followers);
        $post->save();

        return response()->json(['like' => $like, 'followers' => count($followers)]);
    }
}
