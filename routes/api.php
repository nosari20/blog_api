<?php

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Comment;
use Validator as Validator;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/', function () {
    return Redirect::to('/apidoc/index.html');
});

Route::group(['prefix' => 'v1'], function () {
    

    Route::group(['prefix' => 'categories'], function () {
        /**
        * @api {get} /categories Request Categories
        * @apiVersion 1.0.0
        * @apiGroup Category
        * @apiName GetCategories       
        *
        * @apiSuccess {Object[]} categories List of categories.
        * @apiSuccess {Number} category.id Id of the Category.
        * @apiSuccess {String} category.title Title of the Category.
        * @apiSuccess {String} category.sluged_title Sluged itle of the Category.
        * @apiSuccess {String} category.description Description of the Category.
        */
        Route::get('', function (Request $request)    {
            return response()->json(Category::all());
        });
    });

    Route::group(['prefix' => 'posts'], function () {
        /**
        * @api {get} /posts Request Posts
        * @apiVersion 1.0.0
        * @apiGroup Post
        * @apiName GetPost        
        *
        * @apiParam {String} [category] Optional Category Id or slug.
        * @apiParam {Number} [offset] Optional Offset of results.
        * @apiParam {Number} [limit] Optional Limit of results.
        * @apiParam {String} [query] Optional Query string.
        *
        * @apiSuccess {Object[]} posts List of posts.
        * @apiSuccess {Number} post.id Id of the Post.
        * @apiSuccess {String} post.title Title of the Post.
        * @apiSuccess {String} post.subtitle Subtitle of the Post.
        * @apiSuccess {String} post.content Content of the Post.
        * @apiSuccess {Object} post.category Category of the Post.
        * @apiSuccess {Number} post.category.id Id of the Category.
        * @apiSuccess {String} post.category.title Title of the Category.
        * @apiSuccess {String} post.category.sluged_title Sluged Title of the Category.
        * @apiSuccess {String} post.category.description Description of the Category.
        * @apiSuccess {DateTime} post.created_at Date and time of the creation of the Post.
        * @apiSuccess {DateTime} post.updated_at Date and time of the last update of the Post.
        */
        Route::get('', function (Request $request)    {
            $http_code = 200;
            
            if ($request->has('query')){
                $builder = Post::search($request->get('query'))->mini();
            }else{
                $builder = Post::mini();
            }            

            if ($request->has('category')){
                if(intval($request->get('category'))>0){
                    $category = Category::find($request->get('category'));
                }else{
                    $category = Category::where('sluged_title','=',$request->get('category'))->first();                
                }

                if(!$category){
                    return response()->json(['error' => 'Category does not exsit' ], 406);
                }else{
                    $builder = $builder->where('category_id','=',$category->id);            
                }
            }
                

            if ($request->has('offset')){                    
                    if(intval($request->get('offset')) < 0){
                        return response()->json(['error' => 'Negative offset' ], 406);
                    }else{
                        $builder = $builder->skip(intval($request->get('offset')));
                        $http_code = 206;
                    }
            }

            if ($request->has('limit')){
                    if(intval($request->get('limit')) < 0){
                        return response()->json(['error' => 'Negative offset' ], 406);
                    }else{
                        $builder = $builder->take(intval($request->get('limit')));
                        $http_code = 206;
                    }
            }
            
            
            $result = $builder->get()->map(function($post){
                return $post->full();
            });
            return response()->json($result, $http_code);
        });

        /**
        * @api {get} /posts/:id Request Post By Id
        * @apiVersion 1.0.0
        * @apiGroup Post
        * @apiName GetPostByIdOrSlug      
        *
        * @apiParam {String} id Post Id or slug.
        *
        * @apiSuccess {Number} id Id of the Post.
        * @apiSuccess {String} title Title of the Post.
        * @apiSuccess {String} subtitle Subtitle of the Post.
        * @apiSuccess {String} content Content of the Post.
        * @apiSuccess {Object} post.category Category of the Post.
        * @apiSuccess {Number} post.category.id Id of the Category.
        * @apiSuccess {String} post.category.title Title of the Category.
        * @apiSuccess {String} post.category.sluged_title Sluged Title of the Category.
        * @apiSuccess {String} post.category.description Description of the Category.
        * @apiSuccess {DateTime} created_at Date and time of the creation of the Post.
        * @apiSuccess {DateTime} updated_at Date and time of the last update of the Post.
        *
        * @apiError {DateTime} error Description of the error.
        */
        Route::get('{id}', function ($id,Request $request)    {
            if(intval($id)>0){
                $post = Post::find($id);
            }else{
                $post = Post::where('sluged_title','=',$id)->first();
            }
            
            if($post){
                return response()->json($post->full());
            }else{
                return response()->json(['error' => 'Post Not found' ],404);
            }
        });

        Route::group(['prefix' => '{id}/comments'], function () {
            /**
            * @api {get} /posts/:id/comments Request Post Comments
            * @apiVersion 1.0.0
            * @apiGroup Post
            * @apiName GetPostComments        
            *
            * @apiParam {Number} [offset] Optional Offset of results.
            * @apiParam {Number} [limit] Optional Limit of results.
            *
            * @apiSuccess {Object[]} comments List of comment.
            * @apiSuccess {String} comment.id Id of the comment.
            * @apiSuccess {String} comment.author Author of the comment.
            * @apiSuccess {String} comment.text Text of the comment.
            * @apiSuccess {String} comment.created_at Date of the comment.          
            */
            Route::get('', function ($id, Request $request)    {
                $post = Post::find($id);
                if(!$post){
                    return response()->json(['error' => 'Post Not found' ],404);
                }

                $builder = Comment::query()->select('id', 'author','text','created_at')
                                            ->where('post_id','=',$id)
                                            ->orderBy('created_at', 'DESC');

                if ($request->has('offset'))
                        $builder = $builder->skip(intval($request->get('offset')));

                if ($request->has('limit'))
                        $builder = $builder->take(intval($request->get('limit')));                

                return response()->json($builder->get());
            });

            /**
            * @api {post} /posts/:id/comments Create Post Comments
            * @apiVersion 1.0.0
            * @apiGroup Post
            * @apiName PostPostComments        
            *
            * @apiParam {String} author Author of the comment.
            * @apiParam {String} text Text of the comment.
            * @apiParam {Number} postid Post Id of the comment.
            *
            * @apiSuccess (201) {Sring} status Status.
            *
            * @apiError (406) {Array[]} errors Errors.
            * @apiError (406) {String[]} errors.fieldName Errors for the field.           
            */
            Route::post('', function ($id, Request $request)    {

                $validator = Validator::make(array_merge($request->all(),['postid'=>$id]), [
                    'author' => 'required',
                    'text' => 'required',
                    'postid' => 'required|numeric|exists:'.with(new Post)->getTable().',id',
                ]);

                if ($validator->fails()) {
                    return response()->json(['errors' => $validator->errors()],406);
                }else{
                    $author = strip_tags($request->get('author'));
                    $text = strip_tags($request->get('text'));
                    $postId = $id;
                    
                    $comment = new Comment();
                    $comment->author = $author;
                    $comment->text = $text;
                    $comment->post_id = $postId;
                    $comment->save();

                    return response()->json(['status' => 'created' ],201);
                }                
            });
        });
    });
});
