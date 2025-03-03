<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;


class CreatetableController extends Controller
{
    public function table(){
        if (!Schema::hasTable('addresses')){
            Schema::create('addresses', function($table){
                $table->increments('id');
                $table->string('street', 255)->nullable();
                $table->string('country', 255);
                $table->unsignedInteger('icon_id')->nullable();
                $table->unsignedInteger('monster_id');
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('articles')){
            Schema::create('articles', function($table){
                $table->increments('id');
                $table->unsignedInteger('category_id');
                $table->string('title', 255);
                $table->string('slug', 255)->default('');
                $table->text('content');
                $table->string('image', 255)->nullable();
                $table->enum('status', ['PUBLISHED', 'DRAFT'])->default('PUBLISHED');
                $table->date('date');
                $table->boolean('featured')->default(0);
                $table->timestamps();
                $table->softDeletes(); 
            });
        }

        if (!Schema::hasTable('article_tag')){
            Schema::create('article_tag', function($table){
                $table->increments('id');
                $table->unsignedBigInteger('article_id');
                $table->unsignedBigInteger('tag_id');
                $table->timestamps();
                $table->softDeletes(); 
                $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');
                $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
            });
        }

        if (!Schema::hasTable('a_s')){
            Schema::create('a_s', function($table){
                $table->increments('id');
                $table->unsignedBigInteger('b_s_id');
                $table->foreign('b_s_id')->references('id')->on('b_s')->onDelete('cascade');
            });
        }

        if (!Schema::hasTable('bill_detail')){
            Schema::create('bill_detail', function($table){
                $table->increments('id');
                $table->unsignedBigInteger('id_bill');
                $table->unsignedBigInteger('id_product');
                $table->integer('quantity')->comment('số lượng');
                $table->double('unit_price');            $table->timestamps();
                $table->foreign('id_bill')->references('id')->on('bills')->onDelete('cascade');
                $table->foreign('id_product')->references('id')->on('products')->onDelete('cascade');
            });
        }

        if (!Schema::hasTable('b_s')){
            Schema::create('b_s', function($table){
                $table->increments('id');
                $table->string('data', 255);
            });
        }

        if (!Schema::hasTable('categories')){
            Schema::create('categories', function($table){
                $table->increments('id');
                $table->unsignedBigInteger('parent_id')->default(0);
                $table->unsignedInteger('lft')->nullable();
                $table->unsignedInteger('rgt')->nullable();
                $table->unsignedInteger('depth')->nullable();
                $table->string('name', 255);
                $table->string('slug', 255);
                $table->timestamps();
                $table->softDeletes();
            });
        }

        if (!Schema::hasTable('comments')){
            Schema::create('comments', function($table){
                $table->increments('id');
                $table->string('username', 255);
                $table->text('comment');
                $table->unsignedBigInteger('id_product');
                $table->timestamps();
                $table->foreign('id_product')->references('id')->on('products')->onDelete('cascade');
            });
        }

        if (!Schema::hasTable('customers')){
            Schema::create('customers', function($table){
                $table->increments('id');
                $table->string('name', 100);
                $table->string('gender', 10);
                $table->string('email', 50)->unique();
                $table->string('address', 100);
                $table->string('phone_number', 20);
                $table->string('note', 200)->nullable();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('dummies')){
            Schema::create('dummies', function($table){
                $table->increments('id');
                $table->string('name', 255);
                $table->text('description');
                $table->json('extras'); 
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('failed_jobs')){
            Schema::create('failed_jobs', function($table){
                $table->increments('id');
                $table->text('connection'); 
                $table->text('queue'); 
                $table->longText('payload'); 
                $table->longText('exception'); 
                $table->timestamp('failed_at')->useCurrent();
            });
        }

        if (!Schema::hasTable('icons')){
            Schema::create('icons', function($table){
                $table->increments('id');
                $table->string('name', 255); 
                $table->string('icon', 255); 
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('menu_items')){
            Schema::create('menu_items', function($table){
                $table->increments('id');
                $table->string('name', 100);
                $table->string('type', 20)->nullable(); 
                $table->string('link', 255)->nullable(); 
                $table->unsignedBigInteger('page_id')->nullable();
                $table->unsignedBigInteger('parent_id')->nullable(); 
                $table->unsignedInteger('lft')->nullable(); 
                $table->unsignedInteger('rgt')->nullable(); 
                $table->unsignedInteger('depth')->nullable(); 
                $table->timestamps(); 
                $table->softDeletes(); 
                $table->foreign('parent_id')->references('id')->on('menu_items')->onDelete('cascade');
                $table->foreign('page_id')->references('id')->on('pages')->onDelete('set null');
            });
        }

        if (!Schema::hasTable('migrations')){
            Schema::create('migrations', function($table){
                $table->increments('id');
                $table->string('migration', 191); 
                $table->integer('batch');
            });
        }

        if (!Schema::hasTable('model_has_permissions')){
            Schema::create('model_has_permissions', function($table){
                $table->unsignedBigInteger('permission_id');
                $table->string('model_type'); 
                $table->unsignedBigInteger('model_id'); 
                $table->primary(['permission_id', 'model_id', 'model_type']);
                $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
            });
        }

        if (!Schema::hasTable('model_has_roles')){
            Schema::create('model_has_roles', function($table){
                $table->unsignedBigInteger('role_id'); 
            $table->string('model_type'); 
            $table->unsignedBigInteger('model_id'); 
            $table->primary(['role_id', 'model_id', 'model_type']);
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            });
        }

        if (!Schema::hasTable('monsters')){
            Schema::create('monsters', function($table){
                $table->increments('id');
                $table->string('address')->nullable();
                $table->string('browse')->nullable();
                $table->boolean('checkbox')->nullable();
                $table->text('wysiwyg')->nullable();
                $table->string('color')->nullable();
                $table->string('color_picker')->nullable();
                $table->date('date')->nullable();
                $table->date('date_picker')->nullable();
                $table->date('start_date')->nullable();
                $table->date('end_date')->nullable();
                $table->dateTime('datetime')->nullable();
                $table->dateTime('datetime_picker')->nullable();
                $table->string('email')->nullable();
                $table->integer('hidden')->nullable();
                $table->string('icon_picker')->nullable();
                $table->string('image')->nullable();
                $table->string('month')->nullable();
                $table->integer('number')->nullable();
                $table->double('float', 8, 2)->nullable();
                $table->string('password')->nullable();
                $table->string('radio')->nullable();
                $table->string('range')->nullable();
                $table->integer('select')->nullable();
                $table->string('select_from_array')->nullable();
                $table->integer('select2')->nullable();
                $table->integer('select2_from_ajax')->nullable();
                $table->string('select2_from_array')->nullable();
                $table->text('simplemde')->nullable();
                $table->text('summernote')->nullable();
                $table->text('table')->nullable();
                $table->text('textarea')->nullable();
                $table->string('text');
                $table->text('tinymce')->nullable();
                $table->string('upload')->nullable();
                $table->string('upload_multiple')->nullable();
                $table->string('url')->nullable();
                $table->text('video')->nullable();
                $table->string('week')->nullable();
                $table->text('extras')->nullable();
                // $table->string('image')->nullable();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('monster_article')){
            Schema::create('monster_article', function($table){
                $table->increments('id');
                $table->foreignId('monster_id')->constrained('monsters')->onDelete('cascade');
                $table->foreignId('article_id')->constrained('articles')->onDelete('cascade');
                $table->timestamps();
                $table->softDeletes();
            });
        }

        if (!Schema::hasTable('b_s')){
            Schema::create('b_s', function($table){
                $table->increments('id');
                $table->string('data', 255);
            });
        }

        if (!Schema::hasTable('monster_category')){
            Schema::create('monster_category', function($table){
                $table->increments('id');
                $table->foreignId('monster_id')->constrained('monsters')->onDelete('cascade');
                $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
                $table->timestamps();
                $table->softDeletes();
            });
        }



        if (!Schema::hasTable('news')){
            Schema::create('news', function($table){
                $table->increments('id');
                $table->string('title', 200)->comment('Tiêu đề');
                $table->text('content')->comment('Nội dung');
                $table->string('image')->nullable()->comment('Hình ảnh');
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('monster_tag')){
            Schema::create('monster_tag', function ($table) {
                $table->id();
                $table->unsignedBigInteger('monster_id');
                $table->unsignedBigInteger('tag_id');
                
                $table->foreign('monster_id')->references('id')->on('monsters')->onDelete('cascade');
                $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
            
                $table->timestamps();
                $table->softDeletes();
            });
        }

        if (!Schema::hasTable('pages')){
            Schema::create('pages', function($table){
                $table->increments('id');
                $table->string('template');
                $table->string('name');
                $table->string('title');
                $table->string('slug')->unique();
                $table->text('content')->nullable();
                $table->json('extras')->nullable();
                $table->timestamps();
                $table->softDeletes();
            });
        }

        if (!Schema::hasTable('b_s')){
            Schema::create('b_s', function($table){
                $table->increments('id');
                $table->string('data', 255);
            });
        }

        if (!Schema::hasTable('password_resets')){
            Schema::create('password_resets', function($table){
                $table->string('email')->index();
                $table->string('token', 64);
                $table->timestamp('created_at')->nullable();
            });
        }

        if (!Schema::hasTable('permissions')){
            Schema::create('permissions', function($table){
                $table->increments('id');
                $table->string('name');
                $table->string('guard_name', 50)->default('web');
                $table->timestamps();
                $table->unique(['name', 'guard_name']);
            });
        }

        if (!Schema::hasTable('postalboxes')){
            Schema::create('postalboxes', function($table){
                $table->increments('id');
                $table->string('postal_name')->nullable();
                $table->unsignedBigInteger('monster_id');
                $table->foreign('monster_id')->references('id')->on('monsters')->onDelete('cascade');
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('products')){
            Schema::create('products', function($table){
                $table->increments('id');
                $table->string('name', 100)->nullable();
                $table->unsignedBigInteger('id_type')->nullable();
                $table->text('description')->nullable();
                $table->decimal('unit_price', 10, 2)->nullable();
                $table->decimal('promotion_price', 10, 2)->nullable();
                $table->string('image', 255)->nullable();
                $table->string('unit', 255)->nullable();
                $table->boolean('new')->default(0);
                $table->timestamps();

                $table->foreign('id_type')->references('id')->on('product_types')->onDelete('set null');
            });
        }

        if (!Schema::hasTable('revisions')){
            Schema::create('revisions', function($table){
                $table->increments('id');
                $table->string('revisionable_type');
                $table->unsignedBigInteger('revisionable_id');
                $table->unsignedBigInteger('user_id')->nullable();
                $table->string('key');
                $table->text('old_value')->nullable();
                $table->text('new_value')->nullable();
                $table->timestamps();
                $table->index(['revisionable_type', 'revisionable_id']);
                $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            });
        }

        if (!Schema::hasTable('roles')){
            Schema::create('roles', function($table){
                $table->increments('id');
                $table->string('name')->unique();
                $table->string('guard_name');
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('role_has_permissions')){
            Schema::create('role_has_permissions', function($table){
                $table->unsignedBigInteger('permission_id');
                $table->unsignedBigInteger('role_id');

                $table->primary(['permission_id', 'role_id']);

                $table->foreign('permission_id')
                    ->references('id')->on('permissions')
                    ->onDelete('cascade');

                $table->foreign('role_id')
                    ->references('id')->on('roles')
                    ->onDelete('cascade');
            });
        }

        if (!Schema::hasTable('settings')){
            Schema::create('settings', function($table){
                $table->increments('id');
                $table->string('key')->unique();
                $table->string('name');
                $table->string('description')->nullable();
                $table->string('value')->nullable();
                $table->text('field');
                $table->boolean('active')->default(1);
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('slide')){
            Schema::create('slide', function($table){
                $table->increments('id');
                $table->string('link', 255);
                $table->string('image', 255);
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('tags')){
            Schema::create('tags', function($table){
                $table->increments('id');
                $table->string('name');
                $table->string('slug')->unique();
                $table->timestamps();
                $table->softDeletes();
            });
        }

        if (!Schema::hasTable('type_products')){
            Schema::create('type_products', function($table){
                $table->increments('id');
                $table->string('name', 255)->index();
                $table->text('description')->nullable();
                $table->string('image');
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('users')){
            Schema::create('users', function($table){
                $table->increments('id');
                $table->string('name')->index();
                $table->string('email')->unique();
                $table->string('password');
                $table->rememberToken();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('wishlists')){
            Schema::create('wishlists', function($table){
                $table->increments('id');
                $table->foreignId('id_user')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
                $table->foreignId('id_product')->constrained('products')->cascadeOnDelete()->cascadeOnUpdate();
                $table->integer('quantity')->default(1);
                $table->timestamps();
                $table->unique(['id_user', 'id_product']);
            });
        }

        echo "Đã thực hiện lệnh tạo bảng thành công";
    }
}
