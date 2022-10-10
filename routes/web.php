<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\HomeController;


Auth::routes();


//tr sayfalar
Route::get('/','SayfaController@index')->name('anasayfa');
Route::get('blog','TrpageController@blog')->name('en.news');
Route::get('/haber-kategori/{id}','TrpageController@blogkat')->name('tr.bkategori');
Route::get('/haberler/{id}','TrpageController@post')->name('tr.sblog');


//E Ticaret Linkler


Route::get('/category/{slug}','Eticaret\KategoriController@index')->name('kategori');




////////////////////////////
Route::get('contact-us','SayfaController@iletisim')->name('contact-us');
Route::post('contact-us','SayfaController@mail')->name('contact.mail.store');
Route::post('subs-us','SayfaController@subs')->name('subs.mail.store');
Route::post('contact-mailer','SayfaController@mailer')->name('contact.mail.store');
Route::get('unsubscribe','SayfaController@unsub')->name('unsub.mail');
Route::post('unsubscribe','SayfaController@unsbber')->name('unsubpost');
Route::get('/about-us','SayfaController@hakkimda')->name('about-us');



Route::get('/privacy-statement','SayfaController@privacystatements')->name('privacy');
Route::get('/terms-of-use','SayfaController@termscondition')->name('termofuse');


///user backend
///

Route::get('/home', 'HomeController@index')->name('dashboard');
Route::get('/home/siparis/duzenle/{id}','HomeController@edit')->name('user.siparis.duzenle');
Route::get('/home/siparis/sil/{id}','HomeController@sil')->name('user.siparis.sil');

Route::get('change-password','HomeController@sifreform')->name('user.password');
Route::post('change-password','HomeController@Showcphl');
Route::get('change-email','HomeController@emailform')->name('user.email');
Route::post('change-email','HomeController@mailsjsj')->name('emaildegistir');
Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');

Route::get('login','Auth\LoginController@loginform')->name('login');

Route::get('/login/{social}','Auth\LoginController@socialLogin')->where('social','twitter|facebook|linkedin|google|github|bitbucket');
Route::get('/login/{social}/callback','Auth\LoginController@handleProviderCallback')->where('social','twitter|facebook|linkedin|google|github|bitbucket');
Route::prefix('profile')->group(function () {
    Route::get('/', 'HomeController@profile')->name('profile');
    Route::post('/kaydet/{id?}', 'HomeController@profilesave')->name('user.profile.kaydet');

});

Route::group(['prefix' => 'user-order'], function ()
{
    Route::get('/create-step1', 'HomeController@createStep1')->name('order-step1');
    Route::get('/create-step2', 'HomeController@createStep2')->name('order-step2');
    Route::get('/create-step3', 'HomeController@createStep3')->name('order-step3');
    Route::post('/create-step1', 'HomeController@postCreateStep1')->name('order-step1-post');
    Route::post('/create-step2', 'HomeController@postCreateStep2')->name('order-step2-post');
    Route::post('/create-step3/{id?}', 'HomeController@postCreateStep3')->name('order-step3-post');
    Route::get('/dropzone/upload/{id?}','HomeController@createorder')->name('user.dosyaekle');
    Route::post('/dropzone/{id?}','HomeController@dfilestore')->name('user.dosya.gonder');
    Route::get('/destroy/{id}','HomeController@dosyadestroy')->name('user.dosya.sil');
    Route::get('/pasif/{id?}', 'HomeController@pasif')->name('order-ayar-pasif');
    Route::get('/aktif/{id?}', 'HomeController@aktif')->name('order-ayar-aktif');
    Route::post('/orderguncelle/{id?}', 'HomeController@orderguncelle')->name('user.orderguncelle');

});


Route::get('edit-shipping-address/{id?}','HomeController@shipping')->name('user.shipper');
Route::post('edit-shipping-address/kaydet/{id?}','HomeController@shipkaydet')->name('user.shipper.kaydet');

Route::get('edit-billing-address/{id?}','HomeController@billing')->name('user.billing');
Route::post('edit-billing-address/kaydet/{id?}','HomeController@billkaydet')->name('user.billing.kaydet');


//------------------------------------------------------------------



//Admin Routes
Route::prefix('admin')->group(function () {
    Route::get('/', 'Admin\AdminController@index')->name('admin.dashboard');
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::post('/logout','Auth\AdminLoginController@logout')->name('admin.logout');
});

Route::group(['prefix' => 'admin-customer-management'], function () {

    Route::match(['get','post'],'/','Admin\User\AdminUserController@index')->name('admin.user.getir');
    //html form getirir
    Route::get('/goster/{id}','Admin\User\AdminUserController@show')->name('admin.user.goster');
    Route::get('/duzenle/{id}','Admin\User\AdminUserController@edit')->name('admin.user.duzenle');

    Route::post('/duzenle/{id?}','Admin\User\AdminUserController@update')->name('admin.user.dkayit');
    Route::get('/sil/{id}','Admin\User\AdminUserController@sil')->name('admin.user.sil');

});

//Ticket Route

Route::group(['prefix' => 'admin-ticket'], function () {

    Route::match(['get','post'],'/','Admin\Ticket\TicketController@index')->name('admin.ticket');
    Route::post('close_ticket/{ticket_id}', 'Admin\Ticket\TicketController@close')->name('admin.ticket.close');
    Route::post('admin_comment', 'Admin\Ticket\TicketController@postComment')->name('admin.ticket.yorum');
    Route::get('tickets/{ticket_id}', 'Admin\Ticket\TicketController@show')->name('admin.ticket.show');

});


Route::get('/ticket-category/{id}','Admin\Ticket\TicketController@ticketkat')->name('admin.ticket.tkategori');
Route::get('/ticket/{id}','Admin\Ticket\TicketController@ticketpost')->name('admin.ticket.tpost');



Route::group(['prefix' => 'admin-slider-yonetim '], function () {

    Route::match(['get','post'],'/','Admin\SliderController@index')->name('slider.getir');

    Route::post('/kaydet','Admin\SliderController@kaydet')->name('slider.kaydet');

});

Route::group(['prefix' => 'Admin-contact'], function ()
{
    Route::match(['get','post'],'/','Admin\Contact\ContactController@index')->name('admin.contact.index');
    Route::get('/show/{id}','Admin\Contact\ContactController@show')->name('admin.contact.show');
    Route::get('/sil/{id}','Admin\Contact\ContactController@sil')->name('admin.contact.sil');
});

//BLOG yönetim

Route::group(['prefix' => 'Admin-blog'], function ()
{
    Route::match(['get','post'],'/','Admin\Blog\AdminBlogController@index')->name('admin.blog.index');
    Route::get('/yeni','Admin\Blog\AdminBlogController@form')->name('admin.blog.yeni');
    Route::get('/duzenle/{id}','Admin\Blog\AdminBlogController@edit')->name('admin.blog.duzenle');
    Route::post('/kaydet/{id?}','Admin\Blog\AdminBlogController@kaydet')->name('admin.blog.kaydet');
    Route::post('/guncelle/{id?}','Admin\Blog\AdminBlogController@guncelle')->name('admin.blog.guncelle');
    Route::get('/sil/{id}','Admin\Blog\AdminBlogController@sil')->name('admin.blog.sil');
    Route::get('/dropzone/upload/{id}','Admin\Blog\AdminBlogController@dropzone')->name('admin.blog.dosyaekle');
    Route::post('/dropzone/{id?}','Admin\Blog\AdminBlogController@dfilestore')->name('admin.blog.d');
    Route::get('/destroy/{id}','Admin\Blog\AdminBlogController@destroy')->name('admin.dosya.sil');
});


Route::group(['prefix' => 'Admin-blog-kategori'], function ()
{
    Route::match(['get','post'],'/','Admin\Blog\AdminKategoriController@index')->name('admin.blogkategori.index');
    Route::get('/yeni','Admin\Blog\AdminKategoriController@form')->name('admin.blogkategori.yeni');
    Route::get('/duzenle/{id}','Admin\Blog\AdminKategoriController@edit')->name('admin.blogkategori.duzenle');
    Route::post('/kaydet/{id?}','Admin\Blog\AdminKategoriController@kaydet')->name('admin.blogkategori.kaydet');
    Route::post('/guncelle/{id?}','Admin\Blog\AdminKategoriController@guncelle')->name('admin.blogkategori.guncelle');
    Route::get('/sil/{id}','Admin\Blog\AdminKategoriController@sil')->name('admin.blogkategori.sil');
});

Route::group(['prefix' => 'Admin-hizmet'], function ()
{
    Route::match(['get','post'],'/','Admin\Treatment\AdminTreatmentController@index')->name('admin.hizmet.index');
    Route::get('/yeni','Admin\Treatment\AdminTreatmentController@form')->name('admin.hizmet.yeni');
    Route::get('/duzenle/{id}','Admin\Treatment\AdminTreatmentController@edit')->name('admin.hizmet.duzenle');
    Route::post('/kaydet/{id?}','Admin\Treatment\AdminTreatmentController@kaydet')->name('admin.hizmet.kaydet');
    Route::post('/guncelle/{id?}','Admin\Treatment\AdminTreatmentController@guncelle')->name('admin.hizmet.guncelle');
    Route::get('/sil/{id}','Admin\Treatment\AdminTreatmentController@sil')->name('admin.hizmet.sill');
    Route::get('/dropzone/upload/{id}','Admin\Treatment\AdminTreatmentController@dropzone')->name('admin.hizmet.dosyaekle');
    Route::post('/dropzone/{id?}','Admin\Treatment\AdminTreatmentController@dfilestore')->name('admin.hizmet.d');
    Route::get('/destroy/{id}','Admin\Treatment\AdminTreatmentController@destroy')->name('admin.hizmet.sil');
});

Route::group(['prefix' => 'Admin-hizmet-kategori'], function ()
{
    Route::match(['get','post'],'/','Admin\Treatment\AdminKategoriController@index')->name('admin.hizmetkategori.index');
    Route::get('/yeni','Admin\Treatment\AdminKategoriController@form')->name('admin.hizmetkategori.yeni');
    Route::get('/duzenle/{id}','Admin\Treatment\AdminKategoriController@edit')->name('admin.hizmetkategori.duzenle');
    Route::post('/kaydet/{id?}','Admin\Treatment\AdminKategoriController@kaydet')->name('admin.hizmetkategori.kaydet');
    Route::post('/guncelle/{id?}','Admin\Treatment\AdminKategoriController@guncelle')->name('admin.hizmetkategori.guncelle');
    Route::get('/sil/{id}','Admin\Treatment\AdminKategoriController@sil')->name('admin.hizmetkategori.silL');
    Route::get('/destroy/{id}','Admin\Treatment\AdminKategoriController@destroy')->name('admin.hizmetkategori.sil');
});

Route::group(['prefix' => 'Admin-endustri'], function ()
{
    Route::match(['get','post'],'/','Admin\Endustri\AdminEndustriController@index')->name('admin.endustri.index');
    Route::get('/yeni','Admin\Endustri\AdminEndustriController@form')->name('admin.endustri.yeni');
    Route::get('/duzenle/{id}','Admin\Endustri\AdminEndustriController@edit')->name('admin.endustri.duzenle');
    Route::post('/kaydet/{id?}','Admin\Endustri\AdminEndustriController@kaydet')->name('admin.endustri.kaydet');
    Route::post('/guncelle/{id?}','Admin\Endustri\AdminEndustriController@guncelle')->name('admin.endustri.guncelle');
    Route::get('/sil/{id}','Admin\Endustri\AdminEndustriController@sil')->name('admin.endustri.sill');
    Route::get('/dropzone/upload/{id}','Admin\Endustri\AdminEndustriController@dropzone')->name('admin.endustri.dosyaekle');
    Route::post('/dropzone/{id?}','Admin\Endustri\AdminEndustriController@dfilestore')->name('admin.endustri.d');
    Route::get('/destroy/{id}','Admin\Endustri\AdminEndustriController@destroy')->name('admin.endustri.sil');
});

Route::group(['prefix' => 'Admin-endustri-kategori'], function ()
{
    Route::match(['get','post'],'/','Admin\Endustri\AdminKategoriController@index')->name('admin.endustrikategori.index');
    Route::get('/yeni','Admin\Endustri\AdminKategoriController@form')->name('admin.endustrikategori.yeni');
    Route::get('/duzenle/{id}','Admin\Endustri\AdminKategoriController@edit')->name('admin.endustrikategori.duzenle');
    Route::post('/kaydet/{id?}','Admin\Endustri\AdminKategoriController@kaydet')->name('admin.endustrikategori.kaydet');
    Route::post('/guncelle/{id?}','Admin\Endustri\AdminKategoriController@guncelle')->name('admin.endustrikategori.guncelle');
    Route::get('/sil/{id}','Admin\Endustri\AdminKategoriController@sil')->name('admin.endustrikategori.silL');
    Route::get('/destroy/{id}','Admin\Endustri\AdminKategoriController@destroy')->name('admin.endustrikategori.sil');
});




Route::group(['prefix' => 'Admin-urun'], function ()
{
    Route::match(['get','post'],'/','Admin\Urun\AdminUrunController@index')->name('admin.urun');
    Route::get('/yeni','Admin\Urun\AdminUrunController@create')->name('admin.urun.yeni');

    Route::post('/newRecord','Admin\Urun\AdminUrunController@newRecord')->name('admin.urun.newRecord');
    Route::get('/duzenle/{id}','Admin\Urun\AdminUrunController@edit')->name('admin.urun.duzenle');
    Route::post('/kaydet/{id?}','Admin\Urun\AdminUrunController@kaydet')->name('admin.urun.kaydet');
    Route::post('/ara','Admin\Urun\AdminUrunController@ara')->name('admin.urun.ara');
    Route::get('/sil/{id}','Admin\Urun\AdminUrunController@sil')->name('admin.urun.sil');
});

Route::group(['prefix' => 'Admin-category'], function ()
{
    Route::match(['get','post'],'/','Admin\Urun\AdminUrunKategoriController@index')->name('admin.category.index');
    Route::get('/yeni','Admin\Urun\AdminUrunKategoriController@form')->name('admin.category.yeni');
    Route::get('/duzenle/{id}','Admin\Urun\AdminUrunKategoriController@edit')->name('admin.category.duzenle');
    Route::post('/kaydet/{id?}','Admin\Urun\AdminUrunKategoriController@kaydet')->name('admin.category.kaydet');
    Route::post('/guncelle/{id?}','Admin\Urun\AdminUrunKategoriController@guncelle')->name('admin.category.guncelle');
    Route::get('/sil/{id}','Admin\Urun\AdminUrunKategoriController@sil')->name('admin.category.sil');

});


Route::group(['prefix' => 'Admin-attributes'], function ()
{
    Route::match(['get','post'],'/','Admin\Attribute\AttributeController@index')->name('admin.attribute.index');
    Route::get('/yeni','Admin\Attribute\AttributeController@form')->name('admin.attribute.yeni');
    Route::get('/duzenle/{id}','Admin\Attribute\AttributeController@edit')->name('admin.attribute.duzenle');
    Route::post('/kaydet/{id?}','Admin\Attribute\AttributeController@kaydet')->name('admin.attribute.kaydet');
    Route::post('/guncelle/{id?}','Admin\Attribute\AttributeController@guncelle')->name('admin.attribute.guncelle');
    Route::get('/sil/{id}','Admin\Attribute\AttributeController@sil')->name('admin.attribute.sil');

});


Route::group(['prefix' => 'Admin-attributes-product-certificate'], function ()
{
    Route::match(['get','post'],'/','Admin\Attribute\AttributeController@ucertindex')->name('admin.ucert.index');
    Route::get('/yeni','Admin\Attribute\AttributeController@ucertform')->name('admin.ucert.yeni');
    Route::get('/duzenle/{id}','Admin\Attribute\AttributeController@ucertedit')->name('admin.ucert.duzenle');
    Route::post('/kaydet/{id?}','Admin\Attribute\AttributeController@ucertkaydet')->name('admin.ucert.kaydet');
    Route::post('/guncelle/{id?}','Admin\Attribute\AttributeController@ucertguncelle')->name('admin.ucert.guncelle');
    Route::get('/sil/{id}','Admin\Attribute\AttributeController@ucertsil')->name('admin.ucert.sil');

});

Route::group(['prefix' => 'Admin-attributes-product-malzeme'], function ()
{
    Route::match(['get','post'],'/','Admin\Attribute\AttributeController@umalzemeindex')->name('admin.malzeme.index');
    Route::get('/yeni','Admin\Attribute\AttributeController@umalzemeform')->name('admin.malzeme.yeni');
    Route::get('/duzenle/{id}','Admin\Attribute\AttributeController@umalzemeedit')->name('admin.malzeme.duzenle');
    Route::post('/kaydet/{id?}','Admin\Attribute\AttributeController@umalzemekaydet')->name('admin.malzeme.kaydet');
    Route::post('/guncelle/{id?}','Admin\Attribute\AttributeController@umalzemeguncelle')->name('admin.malzeme.guncelle');
    Route::get('/sil/{id}','Admin\Attribute\AttributeController@umalzemesil')->name('admin.malzeme.sil');

});

Route::group(['prefix' => 'Admin-attributes-product-malzeme'], function ()
{
    Route::match(['get','post'],'/','Admin\Attribute\AttributeController@umalzemeindex')->name('admin.malzeme.index');
    Route::get('/yeni','Admin\Attribute\AttributeController@umalzemeform')->name('admin.malzeme.yeni');
    Route::get('/duzenle/{id}','Admin\Attribute\AttributeController@umalzemeedit')->name('admin.malzeme.duzenle');
    Route::post('/kaydet/{id?}','Admin\Attribute\AttributeController@umalzemekaydet')->name('admin.malzeme.kaydet');
    Route::post('/guncelle/{id?}','Admin\Attribute\AttributeController@umalzemeguncelle')->name('admin.malzeme.guncelle');
    Route::get('/sil/{id}','Admin\Attribute\AttributeController@umalzemesil')->name('admin.malzeme.sil');

});

Route::group(['prefix' => 'Admin-attributes-product-color'], function ()
{
    Route::match(['get','post'],'/','Admin\Attribute\AttributeController@umalzemeindex')->name('admin.color.index');
    Route::get('/yeni','Admin\Attribute\AttributeController@umalzemeform')->name('admin.color.yeni');
    Route::get('/duzenle/{id}','Admin\Attribute\AttributeController@umalzemeedit')->name('admin.color.duzenle');
    Route::post('/kaydet/{id?}','Admin\Attribute\AttributeController@umalzemekaydet')->name('admin.color.kaydet');
    Route::post('/guncelle/{id?}','Admin\Attribute\AttributeController@umalzemeguncelle')->name('admin.color.guncelle');
    Route::get('/sil/{id}','Admin\Attribute\AttributeController@umalzemesil')->name('admin.color.sil');

});

Route::group(['prefix' => 'Admin-attributes-product-malzeme'], function ()
{
    Route::match(['get','post'],'/','Admin\Attribute\AttributeController@umalzemeindex')->name('admin.malzeme.index');
    Route::get('/yeni','Admin\Attribute\AttributeController@umalzemeform')->name('admin.malzeme.yeni');
    Route::get('/duzenle/{id}','Admin\Attribute\AttributeController@umalzemeedit')->name('admin.malzeme.duzenle');
    Route::post('/kaydet/{id?}','Admin\Attribute\AttributeController@umalzemekaydet')->name('admin.malzeme.kaydet');
    Route::post('/guncelle/{id?}','Admin\Attribute\AttributeController@umalzemeguncelle')->name('admin.malzeme.guncelle');
    Route::get('/sil/{id}','Admin\Attribute\AttributeController@umalzemesil')->name('admin.malzeme.sil');

});

Route::group(['prefix' => 'Admin-attributes-product-masacap'], function ()
{
    Route::match(['get','post'],'/','Admin\Attribute\AttributeController@umalzemeindex')->name('admin.masacap.index');
    Route::get('/yeni','Admin\Attribute\AttributeController@umalzemeform')->name('admin.masacap.yeni');
    Route::get('/duzenle/{id}','Admin\Attribute\AttributeController@umalzemeedit')->name('admin.masacap.duzenle');
    Route::post('/kaydet/{id?}','Admin\Attribute\AttributeController@umalzemekaydet')->name('admin.masacap.kaydet');
    Route::post('/guncelle/{id?}','Admin\Attribute\AttributeController@umalzemeguncelle')->name('admin.masacap.guncelle');
    Route::get('/sil/{id}','Admin\Attribute\AttributeController@umalzemesil')->name('admin.masacap.sil');

});

Route::group(['prefix' => 'Admin-attributes-ogrenci-masa-yükseklik'], function ()
{
    Route::match(['get','post'],'/','Admin\Attribute\AttributeController@umalzemeindex')->name('admin.ogrmasay.index');
    Route::get('/yeni','Admin\Attribute\AttributeController@umalzemeform')->name('admin.ogrmasay.yeni');
    Route::get('/duzenle/{id}','Admin\Attribute\AttributeController@umalzemeedit')->name('admin.ogrmasay.duzenle');
    Route::post('/kaydet/{id?}','Admin\Attribute\AttributeController@umalzemekaydet')->name('admin.ogrmasay.kaydet');
    Route::post('/guncelle/{id?}','Admin\Attribute\AttributeController@umalzemeguncelle')->name('admin.ogrmasay.guncelle');
    Route::get('/sil/{id}','Admin\Attribute\AttributeController@umalzemesil')->name('admin.ogrmasay.sil');

});

Route::group(['prefix' => 'Admin-attributes-urun-plaka-size'], function ()
{
    Route::match(['get','post'],'/','Admin\Attribute\AttributeController@umalzemeindex')->name('admin.urunplakas.index');
    Route::get('/yeni','Admin\Attribute\AttributeController@umalzemeform')->name('admin.urunplakas.yeni');
    Route::get('/duzenle/{id}','Admin\Attribute\AttributeController@umalzemeedit')->name('admin.urunplakas.duzenle');
    Route::post('/kaydet/{id?}','Admin\Attribute\AttributeController@umalzemekaydet')->name('admin.urunplakas.kaydet');
    Route::post('/guncelle/{id?}','Admin\Attribute\AttributeController@umalzemeguncelle')->name('admin.urunplakas.guncelle');
    Route::get('/sil/{id}','Admin\Attribute\AttributeController@umalzemesil')->name('admin.urunplakas.sil');

});

Route::group(['prefix' => 'Admin-attributes-urun-size'], function ()
{
    Route::match(['get','post'],'/','Admin\Attribute\AttributeController@umalzemeindex')->name('admin.urunsize.index');
    Route::get('/yeni','Admin\Attribute\AttributeController@umalzemeform')->name('admin.urunsize.yeni');
    Route::get('/duzenle/{id}','Admin\Attribute\AttributeController@umalzemeedit')->name('admin.urunsize.duzenle');
    Route::post('/kaydet/{id?}','Admin\Attribute\AttributeController@umalzemekaydet')->name('admin.urunsize.kaydet');
    Route::post('/guncelle/{id?}','Admin\Attribute\AttributeController@umalzemeguncelle')->name('admin.urunsize.guncelle');
    Route::get('/sil/{id}','Admin\Attribute\AttributeController@umalzemesil')->name('admin.urunsize.sil');

});





Route::get('/admin-tema-ayarlari','Tema\TemaController@temaayar')->name('admintema.getir');
//----------------------temaaa----ayarları----------------------------------------
Route::post('/admin-tema-ayarlari/kaydet/{id?}','Tema\TemaController@kaydet')->name('admintema.kaydet');
//------------------------------------------------------------------

//----------------------iletisim----ayarları----------------------------------------
Route::get('/admin-iletisim-ayarlari','Tema\İletisimController@iletisimayar')->name('admin.iletisim.getir');
//------------------------------------------------------------------
Route::post('/admin-iletisim-ayarlari/kaydet/{id?}','Tema\İletisimController@kaydet')->name('admin.iletisim.kaydet');
//------------------------------------------------------------------

Route::get('/admin/şifredegistir','Admin\Ayar\AyarController@Showcph')->name('admin.sifre.getir');
Route::post('/admin/şifredegistirp','Admin\Ayar\AyarController@Showcph1')->name('admin.sifre.degistir');

Route::get('/admin/emaildegistir','Admin\Ayar\AyarController@mailsj')->name('admin.mail.getir');
Route::post('/admin/emaildegistirp','Admin\Ayar\AyarController@mailsjsj')->name('admin.mail.degistir');

Route::get('/subscriber','Admin\SubscriberController@index')->name('subscriber.index');
Route::delete('/subscriber/{subscriber}','Admin\SubscriberController@destroy')->name('admin.subscriber.destroy');


Route::get('denemexxx','DController@index');

Route::get('item', [HomeController::class, 'item']);
Route::post('item', [HomeController::class, 'storeitem'])->name('itempost');

