<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    public function Products()
    {
        return $this->hasMany(Products::class);
    }


    // Hàm để tạo một category mới
    public static function createCategory($name)
    {
        return self::create(['name' => $name]);
    }
    // Hàm để lấy một category theo ID
    public static function getCategoryById($id)
    {
        return self::find($id);
    }

    // Hàm để cập nhật một category
    public static function updateCategory($id, $name)
    {
        $category = self::find($id);
        if ($category) {
            $category->name = $name;
            $category->save();
            return $category;
        }
        return null;
    }

    // Hàm để xóa một category
    public static function deleteCategory($id)
    {
        $category = self::find($id);
        if ($category) {
            $category->delete();
            return true;
        }
        return false;
    }
}
