<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductB2cController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\RecruitmentController;
use App\Http\Controllers\Admin\SletterController;
use App\Http\Controllers\Admin\MembersController;
use App\Http\Controllers\Admin\CertificateController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CategoryB2cController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\Services_2Controller;
use App\Http\Controllers\Admin\WhatsappController;

use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\StateController;
use App\Http\Controllers\Admin\CityController;


use App\Http\Controllers\Admin\HomePageProductController;
use App\Http\Controllers\Admin\HomePageServiceController;

use App\Http\Controllers\Home_Dashboard\SimpleDashboardController;
use App\Http\Controllers\Admin\FranchiseController;
use App\Http\Controllers\Admin\SubFranchiseController;
use App\Http\Controllers\Admin\DigitalVisitingCardController;


use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;

use App\Http\Controllers\Admin\ServiceDashboardController;
use App\Http\Controllers\Admin\ProductDashboardController;

use App\Http\Controllers\Admin\AboutUsDetailController;

use App\Http\Controllers\Admin\WebSupportController;
use App\Http\Controllers\Admin\AppSupportController;
use App\Http\Controllers\Admin\ServerSupportController;
use App\Http\Controllers\Admin\GlobalFranchiseFeesController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\ProjectTaskController;
use App\Http\Controllers\Admin\LeadController;



Route::middleware('auth')->prefix('admin')->as('admin.')->group(function () {

	// Dashboard
	Route::get('admin_dashboard', [DashboardController::class, 'index'])->name('admin_dashboard');

    



	/** user */ 

    Route::any('user', [UserController::class, 'index'])->name('user');

    Route::get('user/create', [UserController::class, 'create'])->name('users.create');

    Route::post('user/store', [UserController::class, 'store'])->name('users.store');

    Route::get('user/view/{id?}', [UserController::class, 'show'])->name('users.view');

    Route::get('user/edit/{id?}', [UserController::class, 'edit'])->name('users.edit');

    Route::get('user/update', [UserController::class, 'update'])->name('users.update');

    Route::post('user/change-status', [UserController::class, 'change_status'])->name('users.change.status');

    /** user */




    /** role */    

    Route::any('role', [RoleController::class, 'index'])->name('role');

    Route::get('role/create', [RoleController::class, 'create'])->name('roles.create');

    Route::post('role/store', [RoleController::class, 'store'])->name('roles.store');

    Route::get('role/view/{id?}', [RoleController::class, 'show'])->name('roles.view');

    Route::get('role/edit/{id?}', [RoleController::class, 'edit'])->name('roles.edit');

    Route::get('role/update/{id?}', [RoleController::class, 'update'])->name('roles.update');

    Route::post('role/delete', [RoleController::class, 'delete'])->name('roles.delete');

    /** role */



    /** permission */

    Route::any('permission', [PermissionController::class, 'index'])->name('permission');

    Route::get('permission/create', [PermissionController::class, 'create'])->name('permission.create');

    Route::post('permission/store', [PermissionController::class, 'store'])->name('permission.store');

    Route::get('permission/view', [PermissionController::class, 'show'])->name('permission.view');

    Route::get('permission/edit', [PermissionController::class, 'edit'])->name('permission.edit');

    Route::get('permission/update/{id?}', [PermissionController::class, 'update'])->name('permission.update');

    Route::post('permission/delete', [PermissionController::class, 'delete'])->name('permission.delete');

    /** permission */

    


    
	//Card Controller
	Route::get('card',[DigitalVisitingCardController::class,'all'])->name('card');
	Route::get('card/listing',[DigitalVisitingCardController::class,'listing'])->name('card.listing');
	Route::get('create/card', [DigitalVisitingCardController::class, 'create'])->name('create.card');
	Route::post('save/card', [DigitalVisitingCardController::class, 'save_card_details'])->name('save.card');
	Route::get('edit/card/{id}',[DigitalVisitingCardController::class,'edit'])->name('card.edit');
	Route::post('update/card',[DigitalVisitingCardController::class,'update'])->name('card.update');
	Route::get('card/show/{id?}',[DigitalVisitingCardController::class,'show'])->name('card.view');
	Route::post('delete/card/{id}', [DigitalVisitingCardController::class, 'delete'])->name('card.delete');
	Route::post('status/card', [DigitalVisitingCardController::class, 'changeStatus'])->name('change.status.card');

	Route::get('generate_vcard/{id}',[DigitalVisitingCardController::class,'generate_vcard'])->name('generate_vcard');

	Route::get('qr_data', [DigitalVisitingCardController::class, 'qr_data'])->name('qr_data');
	
	// Franchise
	Route::get('franchise',[FranchiseController::class,'all'])->name('franchise');
	Route::get('franchise/listing',[FranchiseController::class,'listing'])->name('franchise.listing');
	Route::get('create/franchise',[FranchiseController::class,'create_franchise'])->name('create.franchise');
	Route::post('save/franchise', [FranchiseController::class, 'save_franchise'])->name('save.franchise');

	Route::get('edit/franchise/{id}',[FranchiseController::class,'edit'])->name('franchise.edit');
	Route::post('update/franchise',[FranchiseController::class,'update'])->name('franchise.update');
	Route::get('franchise/show/{id}',[FranchiseController::class,'show'])->name('franchise.view');
	Route::post('delete/franchise/{id}', [FranchiseController::class, 'delete'])->name('franchise.delete');
	Route::post('status/franchise', [FranchiseController::class, 'changeStatus'])->name('franchise.status');

	Route::get('franchise_code/{id}',[FranchiseController::class,'generate_franchise_code'])->name('franchise_code');

	Route::get('franchise_approve/{id}',[FranchiseController::class,'franchise_approve'])->name('franchise_approve');

	Route::get('franchise_reject/{id}',[FranchiseController::class,'franchise_reject'])->name('franchise_reject');


	// Sub Franchise
	Route::get('sub_franchise',[SubFranchiseController::class,'sub_all'])->name('sub_franchise');
	Route::get('sub_franchise/listing',[SubFranchiseController::class,'sub_listing'])->name('sub_franchise.listing');
	
	Route::get('create/sub_franchise',[SubFranchiseController::class,'create_sub_franchise'])->name('create.sub_franchise');
	Route::post('save/sub_franchise', [SubFranchiseController::class, 'save_sub_franchise'])->name('save.sub_franchise');

	Route::get('edit/sub_franchise/{id}',[SubFranchiseController::class,'edit'])->name('sub_franchise.edit');
	Route::post('update/sub_franchise',[SubFranchiseController::class,'update'])->name('sub_franchise.update');
	Route::get('sub_franchise/show/{id}',[SubFranchiseController::class,'show'])->name('sub_franchise.view');
	Route::post('delete/sub_franchise/{id}', [SubFranchiseController::class, 'delete'])->name('sub_franchise.delete');
	Route::post('status/sub_franchise', [SubFranchiseController::class, 'changeStatus'])->name('sub_franchise.status');

	Route::get('generate_sub_franchise_code/{id}',[SubFranchiseController::class,'generate_sub_franchise_code'])->name('generate_sub_franchise_code');

	Route::get('sub_franchise_approve/{id}',[SubFranchiseController::class,'sub_franchise_approve'])->name('sub_franchise_approve');

	Route::get('sub_franchise_reject/{id}',[SubFranchiseController::class,'sub_franchise_reject'])->name('sub_franchise_reject');



	


	// sliders
	Route::get('sliders/listing',[SliderController::class,'listing'])->name('sliders.listing');
	Route::get('sliders',[SliderController::class,'all'])->name('sliders');
	Route::get('create/slider',[SliderController::class,'create'])->name('create.slider');
	Route::post('save/slider',[SliderController::class,'save'])->name('save.slider');
	Route::post('status/slider', [SliderController::class, 'changeStatus'])->name('change.status.slider');
	Route::get('edit/slider/{slider}',[SliderController::class,'edit'])->name('sliders.edit');
	Route::post('delete/slider/{id}', [SliderController::class, 'delete'])->name('sliders.delete');


	//aboutus
	Route::get('about-us/listing',[AboutUsController::class,'listing'])->name('aboutus.listing');
	Route::get('about-us',[AboutUsController::class,'all'])->name('aboutus');
	Route::get('create/aboutus',[AboutUsController::class,'create'])->name('create.aboutus');
	Route::post('save/aboutus',[AboutUsController::class,'save'])->name('save.aboutus');
	Route::post('status/aboutus', [AboutUsController::class, 'changeStatus'])->name('change.status.aboutus');
	Route::get('edit/aboutus/{aboutus}',[AboutUsController::class,'edit'])->name('aboutus.edit');
	Route::post('delete/aboutus/{id}', [AboutUsController::class, 'delete'])->name('aboutus.delete');



	// Contactus
	Route::get('contact-us/listing',[ContactController::class,'listing'])->name('contactus.listing');
	Route::get('contact-us',[ContactController::class,'all'])->name('contactus');
	Route::post('delete/contactus/{id}', [ContactController::class, 'delete'])->name('contact.delete');
	Route::get('contact-us1/listing',[ContactController::class,'listing1'])->name('contactus1.listing');
	Route::get('contact-us1',[ContactController::class,'index'])->name('contactus1');
	Route::post('delete/contactus1/{id}', [ContactController::class, 'delete1'])->name('contactus1.delete');
	Route::get('contact_file/',[ContactController::class,'contact_us_file_list'])->name('contact.file.list');
    Route::get('edit/contact_file/{id}',[ContactController::class,'contact_us_file_edit'])->name('contact.file.edit');
    Route::post('save/contact_file/{id}',[ContactController::class,'contact_us_file_save'])->name('save.contact.file');
    Route::get('edit/whatsapp/{id}',[WhatsappController::class,'edit'])->name('whatsapp.edit');
    Route::post('update/whatsapp/{id}',[WhatsappController::class,'update'])->name('update.whatsapp');
    Route::get('get_whatsapp_no',[WhatsappController::class,'get_whatsapp_no'])->name('get.whatsapp');


	// service
	Route::get('services/listing',[ServiceController::class,'listing'])->name('services.listing');
	Route::get('services',[ServiceController::class,'all'])->name('services');
	Route::get('create/service',[ServiceController::class,'create'])->name('create.service');
	Route::post('save/service',[ServiceController::class,'save'])->name('save.service');
	Route::post('status/service', [ServiceController::class, 'changeStatus'])->name('change.status.service');
	Route::get('edit/service/{service}',[ServiceController::class,'edit'])->name('service.edit');
	Route::post('delete/service/{id}', [ServiceController::class, 'delete'])->name('service.delete');


	//Category
	Route::get('categories/listing/{id}',[CategoryController::class,'listing'])->name('categories.listing');
	Route::get('categories/{id}',[CategoryController::class,'all'])->name('categories');
	Route::get('create/category/{id}',[CategoryController::class,'create'])->name('create.category');
	Route::post('save/category',[CategoryController::class,'save'])->name('save.category');
	Route::get('edit/category/{category}/{parent_id?}',[CategoryController::class,'edit'])->name('categories.edit');
	Route::post('status/category', [CategoryController::class, 'changeStatus'])->name('change.status.category');
	Route::post('delete/category/{id}', [CategoryController::class, 'delete'])->name('categories.delete');




	Route::get('categories_b2c/',[CategoryB2cController::class,'index'])->name('categories.b2c');
	Route::get('categories_b2c_listing/',[CategoryB2cController::class,'listing'])->name('categories.b2c.listing');
    Route::get('categories_b2c_add/',[CategoryB2cController::class,'create'])->name('category.b2c.add');
    Route::post('categories_b2c_save/',[CategoryB2cController::class,'save'])->name('save.category.b2c');

    Route::post('categories_b2c_update/{category}',[CategoryB2cController::class,'update'])->name('update.category.b2c');
    Route::get('edit/categories_b2c/{category}/{parent_id?}',[CategoryB2cController::class,'edit'])->name('categories.b2c.edit');
    Route::post('delete/categories_b2c/{id}', [CategoryB2cController::class, 'delete'])->name('categories.b2c.delete');


	Route::get('sub_categories_b2c/{parentId}',[CategoryB2cController::class,'index_sub'])->name('sub.categories.b2c');
    Route::get('sub_categories_b2c_listing/{parentID}',[CategoryB2cController::class,'sub_categories_b2c_listing'])->name('sub.categories.b2c.listing');

    Route::get('sub_categories_b2c_add/',[CategoryB2cController::class,'create_sub'])->name('sub.category.b2c.add');
	Route::post('sub_categories_b2c_save/',[CategoryB2cController::class,'save_sub'])->name('save.sub.category.b2c');
    Route::post('sub_categories_b2c_update/{category}',[CategoryB2cController::class,'update_sub'])->name('update.sub.category.b2c');
    Route::get('edit/sub_categories_b2c/{category}/{parent_id?}',[CategoryB2cController::class,'edit_sub'])->name('sub.categories.b2c.edit');
    Route::post('delete/sub_categories_b2c/{id}', [CategoryB2cController::class, 'delete_sub'])->name('sub.categories.b2c.delete');

	Route::get('/services_1', [Services_2Controller::class, 'index'])->name('services_1.index');
	Route::get('/services_1/listing', [Services_2Controller::class, 'listing'])->name('services_1.listing');
	Route::get('/services_1/create', [Services_2Controller::class, 'create'])->name('services_1.create');
	Route::post('/services_1/store', [Services_2Controller::class, 'store'])->name('services_1.store');
	Route::get('edit/services_1/{id}', [Services_2Controller::class, 'edit'])->name('services_1.edit');
	Route::post('update/services_1/{id}', [Services_2Controller::class, 'update'])->name('services_1.update');
	Route::post('delete/services_1/{id}', [Services_2Controller::class, 'destroy'])->name('services_1.delete');
	Route::post('status/services_1', [Services_2Controller::class, 'changeStatus'])->name('change.status.services_1');



	// products
	Route::get('products/listing',[ProductController::class,'listing'])->name('products.listing');
	Route::get('products',[ProductController::class,'all'])->name('products');
	Route::get('create/product',[ProductController::class,'create'])->name('create.product');
	Route::post('save/product',[ProductController::class,'save'])->name('save.product');
	Route::post('status/product', [ProductController::class, 'changeStatus'])->name('change.status.product');
	Route::get('edit/product/{product}',[ProductController::class,'edit'])->name('product.edit');
	Route::post('delete/product/{id}', [ProductController::class, 'delete'])->name('product.delete');
	Route::post('delete/product-image', [ProductController::class, 'deleteImage'])->name('delete.product.image');
	
	Route::get('brandproduct_list/{id}',[ProductController::class,'brandproduct'])->name('brandproduct.list');
    Route::get('create/brandproduct/{id}',[ProductController::class,'createbrandproduct'])->name('brandproduct.create');
    Route::post('store/brandproduct/',[ProductController::class,'storebrandproduct'])->name('brandproduct.store');
    Route::get('edit/brandproduct/{id}',[ProductController::class,'brandproductedit'])->name('brandproduct.edit');
    Route::post('update/brandproduct/{brandproduct}',[ProductController::class,'brandproductupdate'])->name('brandproduct.update');
    Route::delete('delete/brandproduct/{id}',[ProductController::class,'brandproductdestroy'])->name('brandproduct.delete');
    


    Route::get('products_b2c/listing',[ProductB2cController::class,'listing'])->name('products.b2c.listing');
    Route::get('products_b2c',[ProductB2cController::class,'all'])->name('products.b2c');
	Route::get('create/product_b2c',[ProductB2cController::class,'create'])->name('create.product.b2c');
	Route::post('save/product_b2c',[ProductB2cController::class,'save'])->name('save.product.b2c');
    Route::get('edit/product_b2c/{product}',[ProductB2cController::class,'edit'])->name('product.b2c.edit');
	Route::post('delete/product_b2c/{id}', [ProductB2cController::class, 'delete'])->name('product.b2c.delete');
	Route::post('delete/product_b2c-image', [ProductB2cController::class, 'deleteImage'])->name('delete.product.b2c.image');




	// projects
	Route::get('projects/listing',[ProjectController::class,'listing'])->name('projects.listing');
	Route::get('projects',[ProjectController::class,'all'])->name('projects');
	Route::get('create/project',[ProjectController::class,'create'])->name('create.project');
	Route::post('save/project',[ProjectController::class,'save'])->name('save.project');
	Route::post('status/project', [ProjectController::class, 'changeStatus'])->name('change.status.project');
	Route::get('edit/project/{project}',[ProjectController::class,'edit'])->name('project.edit');
	Route::post('update/project/{id}',[ProjectController::class,'update'])->name('project.update');
	Route::post('delete/project/{id}', [ProjectController::class, 'delete'])->name('project.delete');

	// galleries
	Route::get('galleries/listing',[GalleryController::class,'listing'])->name('galleries.listing');
	Route::get('galleries',[GalleryController::class,'all'])->name('galleries');
	Route::get('create/gallery',[GalleryController::class,'create'])->name('create.gallery');
	Route::post('save/gallery',[GalleryController::class,'save'])->name('save.gallery');
	Route::post('status/gallery', [GalleryController::class, 'changeStatus'])->name('change.status.gallery');
	Route::get('edit/gallery/{gallery}',[GalleryController::class,'edit'])->name('gallery.edit');
	Route::post('delete/gallery/{id}', [GalleryController::class, 'delete'])->name('gallery.delete');


	// blogs
	Route::get('blogs/listing',[BlogController::class,'listing'])->name('blogs.listing');
	Route::get('blogs',[BlogController::class,'all'])->name('blogs');
	Route::get('create/blog',[BlogController::class,'create'])->name('create.blog');
	Route::post('save/blog',[BlogController::class,'save'])->name('save.blog');
	Route::post('status/blog', [BlogController::class, 'changeStatus'])->name('change.status.blog');
	Route::get('edit/blog/{blog}',[BlogController::class,'edit'])->name('blog.edit');
	Route::post('delete/blog/{id}', [BlogController::class, 'delete'])->name('blog.delete');


	// recruitments
	Route::get('recruitments/listing',[RecruitmentController::class,'listing'])->name('recruitments.listing');
	Route::get('recruitments',[RecruitmentController::class,'all'])->name('recruitments');
	Route::get('create/recruitment',[RecruitmentController::class,'create'])->name('create.recruitment');
	Route::post('save/recruitment',[RecruitmentController::class,'save'])->name('save.recruitment');
	Route::post('status/recruitment', [RecruitmentController::class, 'changeStatus'])->name('change.status.recruitment');
	Route::get('edit/recruitment/{recruitment}',[RecruitmentController::class,'edit'])->name('recruitment.edit');
	Route::post('delete/recruitment/{id}', [RecruitmentController::class, 'delete'])->name('recruitment.delete');

    //recuritu
    Route::get('recruitu/listing',[RecruitmentController::class,'recruitu'])->name('recruitu.listing');


	// sletter
	Route::get('sletters/listing',[SletterController::class,'listing'])->name('sletters.listing');
	Route::get('sletters',[SletterController::class,'all'])->name('sletters');
	Route::post('status/sletter', [SletterController::class, 'changeStatus'])->name('change.status.sletter');
	Route::post('delete/sletter/{id}', [SletterController::class, 'delete'])->name('sletter.delete');


	// teammembers
	Route::get('members/listing',[MembersController::class,'listing'])->name('members.listing');
	Route::get('members',[MembersController::class,'all'])->name('members');
	Route::get('create/member',[MembersController::class,'create'])->name('create.member');
	Route::post('save/member',[MembersController::class,'save'])->name('save.member');
	Route::post('status/member', [MembersController::class, 'changeStatus'])->name('change.status.member');
	Route::get('edit/member/{member}',[MembersController::class,'edit'])->name('member.edit');
	Route::post('delete/member/{id}', [MembersController::class, 'delete'])->name('member.delete');

	// certificate
	Route::get('certificates/listing',[CertificateController::class,'listing'])->name('certificates.listing');
	Route::get('certificates',[CertificateController::class,'all'])->name('certificates');
	Route::get('create/certificate',[CertificateController::class,'create'])->name('create.certificate');
	Route::post('save/certificate',[CertificateController::class,'save'])->name('save.certificate');
	Route::post('status/certificate', [CertificateController::class, 'changeStatus'])->name('change.status.certificate');
	Route::get('edit/certificate/{certificate}',[CertificateController::class,'edit'])->name('certificate.edit');
	Route::post('delete/certificate/{id}', [CertificateController::class, 'delete'])->name('certificate.delete');

	// brands
	Route::get('brands/listing',[BrandController::class,'listing'])->name('brands.listing');
	Route::get('brands',[BrandController::class,'all'])->name('brands');
	Route::get('create/brand',[BrandController::class,'create'])->name('create.brand');
	Route::post('save/brand',[BrandController::class,'save'])->name('save.brand');
	Route::post('status/brand', [BrandController::class, 'changeStatus'])->name('change.status.brand');
	Route::get('edit/brand/{brand}',[BrandController::class,'edit'])->name('brand.edit');
	Route::post('delete/brand/{id}', [BrandController::class, 'delete'])->name('brand.delete');

	// Partners
	Route::get('partners/listing',[PartnerController::class,'listing'])->name('partners.listing');
	Route::get('partners',[PartnerController::class,'all'])->name('partners');
	Route::get('create/partner',[PartnerController::class,'create'])->name('create.partner');
	Route::post('save/partner',[PartnerController::class,'save'])->name('save.partner');
	Route::post('status/partner', [PartnerController::class, 'changeStatus'])->name('change.status.partner');
	Route::get('edit/partner/{partner}',[PartnerController::class,'edit'])->name('partner.edit');
	Route::post('delete/partner/{id}', [PartnerController::class, 'delete'])->name('partner.delete');

	// Client
	Route::get('clients/listing',[ClientController::class,'listing'])->name('clients.listing');
	Route::get('clients',[ClientController::class,'all'])->name('clients');
	Route::get('create/client',[ClientController::class,'create'])->name('create.client');
	Route::post('save/client',[ClientController::class,'save'])->name('save.client');
	Route::post('status/client', [ClientController::class, 'changeStatus'])->name('change.status.client');
	Route::get('edit/client/{client}',[ClientController::class,'edit'])->name('client.edit');
	Route::post('delete/client/{id}', [ClientController::class, 'delete'])->name('client.delete');

	//Testimonial
	Route::get('testimonial/listing',[TestimonialController::class,'listing'])->name('testimonials.listing');
	Route::get('testimonials',[TestimonialController::class,'all'])->name('testimonials');
	Route::get('create/testimonial', [TestimonialController::class, 'create'])->name('create.testimonial');
	Route::post('save/testimonial', [TestimonialController::class, 'store'])->name('save.testimonial');
	Route::get('edit/testimonial/{testimonial}', [TestimonialController::class, 'edit'])->name('testimonials.edit');
	Route::post('status/testimonial', [TestimonialController::class, 'changeStatus'])->name('change.status.testimonial');
	Route::post('delete/testimonial/{id}', [TestimonialController::class, 'delete'])->name('testimonials.delete');
	

		// Partners
	Route::get('partners/listing',[PartnerController::class,'listing'])->name('partners.listing');
	Route::get('partners',[PartnerController::class,'all'])->name('partners');
	Route::get('create/partner',[PartnerController::class,'create'])->name('create.partner');
	Route::post('save/partner',[PartnerController::class,'save'])->name('save.partner');
	Route::post('status/partner', [PartnerController::class, 'changeStatus'])->name('change.status.partner');
	Route::get('edit/partner/{partner}',[PartnerController::class,'edit'])->name('partner.edit');
	Route::post('delete/partner/{id}', [PartnerController::class, 'delete'])->name('partner.delete');
	
	

	//HOME
		Route::get('homepageproduct/listing',[HomePageProductController::class,'listing'])->name('homepageproduct.listing');
    Route::get('homepageproduct',[HomePageProductController::class,'index'])->name('homepageproduct');
	Route::get('create/homepageproduct',[HomePageProductController::class,'create'])->name('create.homepageproduct');
    Route::post('save/homepageproduct',[HomePageProductController::class,'save'])->name('save.homepageproduct');

    Route::get('edit/homepageproduct/{id}',[HomePageProductController::class,'edit'])->name('homepageproduct.edit');
    Route::post('edit/homepageproduct/{id}',[HomePageProductController::class,'update'])->name('update.homepageproduct');
    Route::post('delete/homepageproduct/{id}',[HomePageProductController::class,'destroy'])->name('homepageproduct.delete');




    Route::get('homepageservice/listing',[HomePageServiceController::class,'listing'])->name('homepageservice.listing');
    Route::get('homepageservice',[HomePageServiceController::class,'index'])->name('homepageservice');
	Route::get('create/homepageservice',[HomePageServiceController::class,'create'])->name('create.homepageservice');
    Route::post('save/homepageservice',[HomePageServiceController::class,'save'])->name('save.homepageservice');
     Route::get('edit/homepageservice/{id}',[HomePageServiceController::class,'edit'])->name('homepageservice.edit');
    Route::post('edit/homepageservice/{id}',[HomePageServiceController::class,'update'])->name('update.homepageservice');
    Route::post('delete/homepageservice/{id}',[HomePageServiceController::class,'destroy'])->name('homepageservice.delete');


    // Country
    Route::any('country', [CountryController::class, 'index'])->name('country');
    Route::get('country/create', [CountryController::class, 'create'])->name('country.create');
    Route::post('country/insert', [CountryController::class, 'insert'])->name('country.insert');
    Route::get('country/view/{id?}', [CountryController::class, 'view'])->name('country.view');
    Route::get('country/edit/{id?}', [CountryController::class, 'edit'])->name('country.edit');
    Route::post('country/update', [CountryController::class, 'update'])->name('country.update');
    Route::post('country/change-status', [CountryController::class, 'change_status'])->name('country.change.status');
   
    //  state /
    Route::any('state', [StateController::class, 'index'])->name('state');
    Route::get('state/create', [StateController::class, 'create'])->name('state.create');
    Route::post('state/insert', [StateController::class, 'insert'])->name('state.insert');
    Route::get('state/view/{id?}', [StateController::class, 'view'])->name('state.view');
    Route::get('state/edit/{id?}', [StateController::class, 'edit'])->name('state.edit');
    Route::post('state/update', [StateController::class, 'update'])->name('state.update');
    Route::post('state/change-status', [StateController::class, 'change_status'])->name('state.change.status');
    


    //  city /
    Route::any('city', [CityController::class, 'index'])->name('city');
    Route::get('city/create', [CityController::class, 'create'])->name('city.create');
    Route::post('city/insert', [CityController::class, 'insert'])->name('city.insert');
    Route::get('city/view/{id?}', [CityController::class, 'view'])->name('city.view');
    Route::get('city/edit/{id?}', [CityController::class, 'edit'])->name('city.edit');
    Route::post('city/update', [CityController::class, 'update'])->name('city.update');
    Route::post('city/change-status', [CityController::class, 'change_status'])->name('city.change.status');
    


	

	// service
	Route::get('dashboard_services',[ServiceDashboardController::class,'index'])->name('dashboard_services');
    Route::get('view_service/{id}',[ServiceDashboardController::class,'show'])->name('view_service');
    Route::post('save/services/contacts',[ServiceDashboardController::class,'save_services_contacts'])->name('save.services.contacts');

    Route::get('dashboard_products',[ProductDashboardController::class,'index'])->name('dashboard_products');
    Route::get('view_products/{id}',[ProductDashboardController::class,'show'])->name('view_products');

    // About Us Details
    Route::get('about_us_detail/listing',[AboutUsDetailController::class,'listing'])->name('about_us_detail.listing');
	Route::get('about_us_detail',[AboutUsDetailController::class,'all'])->name('about_us_detail');
	Route::get('create/about_us_detail',[AboutUsDetailController::class,'create'])->name('create.about_us_detail');
	Route::post('save/about_us_detail',[AboutUsDetailController::class,'save'])->name('save.about_us_detail');
	Route::post('status/about_us_detail', [AboutUsDetailController::class, 'changeStatus'])->name('change.status.about_us_detail');
	Route::get('edit/about_us_detail/{about_us_detail}',[AboutUsDetailController::class,'edit'])->name('about_us_detail.edit');
	Route::post('update/about_us_detail/{about_us_detail}',[AboutUsDetailController::class,'update'])->name('about_us_detail.update');
	Route::post('delete/about_us_detail/{id}', [AboutUsDetailController::class, 'delete'])->name('about_us_detail.delete');


	// Web Support Details
    Route::get('websupport/listing',[WebSupportController::class,'listing'])->name('websupport.listing');
	Route::get('websupport',[WebSupportController::class,'all'])->name('websupport');
	Route::get('create/websupport',[WebSupportController::class,'create'])->name('create.websupport');
	Route::post('save/websupport',[WebSupportController::class,'save'])->name('save.websupport');
	Route::post('status/websupport', [WebSupportController::class, 'changeStatus'])->name('change.status.websupport');
	Route::get('websupport/view/{id}', [WebSupportController::class, 'show'])->name('websupport.view');
	Route::get('edit/websupport/{id}',[WebSupportController::class,'edit'])->name('websupport.edit');
	Route::post('update/websupport/{id}',[WebSupportController::class,'update'])->name('websupport.update');
	Route::post('delete/websupport/{id?}', [WebSupportController::class, 'delete'])->name('websupport.delete');


	// App Support Details
    Route::get('appsupport/listing',[AppSupportController::class,'listing'])->name('appsupport.listing');
	Route::get('appsupport',[AppSupportController::class,'all'])->name('appsupport');
	Route::get('create/appsupport',[AppSupportController::class,'create'])->name('create.appsupport');
	Route::post('save/appsupport',[AppSupportController::class,'save'])->name('save.appsupport');
	Route::post('status/appsupport', [AppSupportController::class, 'changeStatus'])->name('change.status.appsupport');
	Route::get('appsupport/view/{id}', [AppSupportController::class, 'show'])->name('appsupport.view');
	Route::get('edit/appsupport/{id}',[AppSupportController::class,'edit'])->name('appsupport.edit');
	Route::post('update/appsupport/{id}',[AppSupportController::class,'update'])->name('appsupport.update');
	Route::post('delete/appsupport/{id?}', [AppSupportController::class, 'delete'])->name('appsupport.delete');


	// Server Support Details
    Route::get('serversupport/listing',[ServerSupportController::class,'listing'])->name('serversupport.listing');
	Route::get('serversupport',[ServerSupportController::class,'all'])->name('serversupport');
	Route::get('create/serversupport',[ServerSupportController::class,'create'])->name('create.serversupport');
	Route::post('save/serversupport',[ServerSupportController::class,'save'])->name('save.serversupport');
	Route::post('status/serversupport', [ServerSupportController::class, 'changeStatus'])->name('change.status.serversupport');
	Route::get('serversupport/view/{id}', [ServerSupportController::class, 'show'])->name('serversupport.view');
	Route::get('edit/serversupport/{id}',[ServerSupportController::class,'edit'])->name('serversupport.edit');
	Route::post('update/serversupport/{id}',[ServerSupportController::class,'update'])->name('serversupport.update');
	Route::post('delete/serversupport/{id?}', [ServerSupportController::class, 'delete'])->name('serversupport.delete');



	// Global Franchise Fees Details
    Route::get('global_franchise/listing',[GlobalFranchiseFeesController::class,'listing'])->name('global_franchise.listing');
	Route::get('global_franchise',[GlobalFranchiseFeesController::class,'all'])->name('global_franchise');
	Route::get('create/global_franchise',[GlobalFranchiseFeesController::class,'create'])->name('create.global_franchise');
	Route::post('save/global_franchise',[GlobalFranchiseFeesController::class,'save'])->name('save.global_franchise');
	Route::post('status/global_franchise', [GlobalFranchiseFeesController::class, 'changeStatus'])->name('change.status.global_franchise');
	Route::get('global_franchise/view/{id}', [GlobalFranchiseFeesController::class, 'show'])->name('global_franchise.view');
	Route::get('edit/global_franchise/{id}',[GlobalFranchiseFeesController::class,'edit'])->name('global_franchise.edit');
	Route::post('update/global_franchise/{id}',[GlobalFranchiseFeesController::class,'update'])->name('global_franchise.update');
	Route::post('delete/global_franchise/{id?}', [GlobalFranchiseFeesController::class, 'delete'])->name('global_franchise.delete');


	// Project Task Details
    Route::get('project/task/listing',[ProjectTaskController::class,'listing'])->name('project.task.listing');
	Route::get('project/task',[ProjectTaskController::class,'all'])->name('project.task');
	Route::get('create/project/task',[ProjectTaskController::class,'create'])->name('create.project.task');
	Route::post('save/project/task',[ProjectTaskController::class,'save'])->name('save.project.task');
	Route::post('status/project/task', [ProjectTaskController::class, 'changeStatus'])->name('change.status.project.task');

	Route::post('change_project_task_status', [ProjectTaskController::class, 'change_project_task_status'])->name('change_project_task_status');

	Route::get('project/task/view/{id}', [ProjectTaskController::class, 'show'])->name('project.task.view');
	Route::get('edit/project/task/{id}',[ProjectTaskController::class,'edit'])->name('project.task.edit');
	Route::post('update/project/task/{id}',[ProjectTaskController::class,'update'])->name('project.task.update');
	Route::post('delete_project_task/{id?}', [ProjectTaskController::class, 'delete'])->name('delete_project_task');

	Route::post('create_project_task/{id?}',[ProjectTaskController::class,'create_project_milestone'])->name('create_project_task');
	Route::post('project_task_update/{id?}',[ProjectTaskController::class,'update_milestone'])->name('project_task_update');



	// Lead Board
	Route::get('lead/listing',[LeadController::class,'listing'])->name('lead.listing');
	Route::get('lead',[LeadController::class,'all'])->name('lead');
	Route::get('create/lead',[LeadController::class,'create'])->name('create.lead');
	Route::post('save/lead',[LeadController::class,'save'])->name('save.lead');
	Route::post('lead/change-status', [LeadController::class, 'change_status'])->name('lead.change.status');
	Route::get('lead/view/{id}', [LeadController::class, 'show'])->name('lead.view');
	Route::get('edit/lead/{id}',[LeadController::class,'edit'])->name('lead.edit');
	Route::post('update/lead/{id}',[LeadController::class,'update'])->name('lead.update');
	Route::post('delete/lead/{id?}', [LeadController::class, 'delete'])->name('lead.delete');

	
	//PAYMENT ROUTE
	Route::post('api/phonepe/checkout', [PaymentController::class, 'checkout']);

	//CALLBACK ROUTE
	Route::any('phonepe-response/{data?}', [PaymentController::class, 'phonepeResponse'])->name('response');

	Route::get('phonepe-success', [PaymentController::class, 'phonepeSuccess'])->name('phonepay.success');
});

Route::middleware('auth')->get('admin/simple_dashboard', [SimpleDashboardController::class, 'simple_dashboard'])->name('simple_dashboard');





