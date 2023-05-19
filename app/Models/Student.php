<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    private static $student, $image, $imageName, $imageUrl, $imageExtension, $directory;

    private static function getImageUrl($request)
    {
        self::$image = $request->file('image');
        self::$imageExtension = self::$image->getClientOriginalExtension();
        self::$imageName = rand(10000, 50000).'.'.self::$imageExtension;
        self::$directory = 'img/upload/';
        self::$image->move(self::$directory, self::$imageName);
        self::$imageUrl = self::$directory.self::$imageName;
        return self::$imageUrl;
    }

    public static function newStudent($request)
    {
        self::$student = new Student();
        self::$student ->subject_id = $request->subject_id;
        self::$student ->student_id = $request->student_id;
        self::$student ->name = $request->name;
        self::$student ->email = $request->email;
        self::$student ->mobile = $request->mobile;
        self::$student ->image = self::getImageUrl($request);
        self::$student ->save();
    }

    public static function updateStudent($request, $id)
    {
        self::$student = Student::find($id);
        if ($request->file('image'))
        {
            if (file_exists(self::$student->image))
            {
                unlink(self::$student->image);
            }
            self::$imageUrl = self::getImageUrl($request);
        }

        else
        {
            self::$imageUrl = self::$student->image;
        }


        self::$student ->subject_id = $request->subject_id;
        self::$student ->student_id = $request->student_id;
        self::$student ->name = $request->name;
        self::$student ->email = $request->email;
        self::$student ->mobile = $request->mobile;
        self::$student ->image = self::$imageUrl;
        self::$student ->save();
    }

    public static function deleteStudent($id)
    {
        self::$student = Student::find($id);
        if (file_exists(self::$student->image))
        {
            unlink(self::$student->image);
        }

        self::$student->delete();
    }
}
