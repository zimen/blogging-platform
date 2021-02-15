<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Post extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'publication_date',
        'author_id'
    ];
    
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'publication_date'];

    /*
      |--------------------------------------------------------------------------
      | RELATIONS
      |--------------------------------------------------------------------------
     */

    public function author() {
        return $this->belongsTo(User::class, 'author_id');
    }
    
    /*
     * Method for loading post from the given API
     */
    
    public static function loadForeignPosts(){
        $response = Http::get('https://sq1-api-test.herokuapp.com/posts');
        if ($response->ok()){
            $posts = $response->json()['data'];            
            foreach($posts as $post){
                $postModel = new Post();
                $postModel->fill($post);
                $postModel->author_id = 1;
                $postModel->save();
            }
        }
    }
    
}
