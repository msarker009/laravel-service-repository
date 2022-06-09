<?php
namespace App\Repositories;
use App\Models\Post;
use http\Exception\InvalidArgumentException;

class PostRepository{

    protected $post;
    public function __construct(Post $post){
            $this->post=$post;
    }

    public function getAllPost(){
        return $this->post->get();
    }

    public function getById($id){
        return $this->post
            ->where('id',$id)
            ->get();
    }

    public function save($data){
        $post=new $this->post;

        $post->title=$data['title'];
        $post->description=$data['description'];

        $post->save();
        return $post->fresh();
    }

    public function postUpdate($data,$id){
        $post=$this->post->find($id);
        $post->title=$data['title'];
        $post->description=$data['description'];
        $post->update();
        return $post;
    }

    public function delete($id){
        $post=$this->post->find($id);
        $post->delete();

        return $post;
    }

}
