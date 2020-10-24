<?php

namespace tutuorfinder\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * tutuorfinder\Models\xy_subject_node
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\tutuorfinder\Models\xy_subject_node newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\tutuorfinder\Models\xy_subject_node newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\tutuorfinder\Models\xy_subject_node query()
 * @mixin \Eloquent
 */
class xy_subject_node extends Model
{
    //
    public static $view_subjects = 'view_subjects';
    public static $view_chapters = 'view_chapters';
    public static $view_parts = 'view_parts';

    public static function isSubjectNameExist($subjectName)
    {
        /** @var  xy_subject_node $subjectModel */
        $subjectModel = DB::table(self::$view_subjects)->whereRaw('LOWER(name) = "?" ', $subjectName)->first();
        if ($subjectModel == null) {
            return false;
        } else {
            return true;
        }
    }
    public static function isChapterExistForSubject($subjectId,$chapterName){
        $chapterModel=DB::table(self::$view_chapters)->where('name',$chapterName)->where('parent_id',$subjectId)->get();

        return (sizeof($chapterModel)<1?false:true);

    }
    public static function isPartExistForChapter($chapterId,$chapterName){
        $chapterModel=DB::table(self::$view_parts)->where('name',$chapterName)->where('parent_id',$chapterId)->get();
        return (sizeof($chapterModel)<1?false:true);
    }

    public static function getListChapterBySubjectId($subjectId){
        $chapters=DB::table(self::$view_chapters)->whereRaw('parent_id=?',$subjectId)->orderBy('number')->get()->toArray();
        foreach($chapters as $k=>$v){
            $chapters[$k]->parts=self::getListPartByChapterId($chapters[$k]->id);
        }

        return $chapters;


    }

    public static function getListPartBySubjectId($subjectId){
        return DB::table(self::$view_parts)->whereRaw('gparent_id=?',$subjectId)->orderBy('number')->get()->toArray();


    }
    public static function getListPartByChapterId($chapterId){
        return DB::table(self::$view_parts)->whereRaw('parent_id=?',$chapterId)->orderBy('number')->get()->toArray();


    }



}
