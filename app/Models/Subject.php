<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    private static $subject, $image, $imageName, $imageExtension, $directory, $imageUrl;

    private  static function getImageUrl($request)
    {
        self::$image = $request->file('image');
        self::$imageExtension = self::$image->getClientOriginalExtension();
        self::$imageName = rand(10000, 50000).'.'.self::$imageExtension;
        self::$directory = 'img/upload/subject/';
        self::$image->move(self::$directory, self::$imageName);
        self::$imageUrl = self::$directory.self::$imageName;
        return self::$imageUrl;
    }

    public static function newSubject($request)
    {
        self::$subject = new Subject();
        self::$subject ->name = $request->name;
        self::$subject ->image = self::getImageUrl($request);
        self::$subject ->save();
    }

    public static function updateSubject($request, $id)
    {
        self::$subject = Subject::find($id);
        if ($request->file('image'))
        {
            if (file_exists(self::$subject->image))
            {
                unlink(self::$subject->image);
            }
            self::$imageUrl = self::getImageUrl($request);
        }

        else
        {
            self::$imageUrl = self::$subject->image;
        }

        self::$subject ->name = $request->name;
        self::$subject ->image = self::$imageUrl;
        self::$subject ->save();
    }

    public static function deleteSubject($id)
    {
        self::$subject = Subject::find($id);
        if (file_exists(self::$subject->image))
        {
            unlink(self::$subject->image);
        }

        self::$subject->delete();
    }
}
