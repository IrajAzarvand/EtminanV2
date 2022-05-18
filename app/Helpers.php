<?php

use App\Models\Ptype;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

/**
 *
 *
 * @return array
 */
function SiteLang()
{
    return [
        'FA' => [
            'name' => 'فارسی',
            'rtl' => 1,
        ],
        'EN' => [
            'name' => 'انگلیسی',
            'rtl' => 0,
        ],
        'RU' => [
            'name' => 'روسی',
            'rtl' => 0,
        ],
        'AR' => [
            'name' => 'عربی',
            'rtl' => 1,
        ],
    ];
}

/**
 * set default locale to first item in locale file in config. => fa
 *
 * @return string
 */
function DefaultLocale()
{
    return "FA";
}


//for showing menu breadcrums in panel pages
function Menu($page)
{
    $All = DashboardMenus();
    $Flattened = Arr::dot($All);
    $CurrentPage = array_keys($Flattened, $page)[0];
    return explode('.', $CurrentPage);
}

//Menus used in Dashboard
function DashboardMenus()
{
    $Role = Auth::user()->role_id;
    switch ($Role) {
            // Admin
        case 1:
            $Menus = [

                'صفحه اصلی' => [
                    'اسلایدر و المان ها' => 'ShowSliderSettingPage',
                    'درباره ما' => 'ShowAboutUspage',
                    'رویدادها' => 'ShowEventspage',
                ],
                'محصولات' => [
                    'تعریف نوع اصلی محصول' => 'ShowPTypepage',
                    'دسته بندی های محصولات' => 'ShowWeightFlavorPage',
                    'افزودن محصول جدید' => 'ShowNewProductPage',
                ],
                'گالری تصاویر' => [
                    'گالری تصاویر' => 'ShowGalleryPage',

                ],
                'تنظیمات' => [
                    'افزودن کاربر' => 'ShowAddUserPage',
                    'Clear Cache' => 'ClearCache',
                    'migrate and refresh' => 'migrate-refresh'
                ],

            ];
            break;

        default:
            // Other users
            $Menus = [

                'ایمیل' => [
                    'ایمیل ها' => 'ShowEmailPage',
                ],
            ];
    }
    return $Menus;
}

//Menus used in Main Website
function MainNav()
{

    return [
        'index' => [
            'FA' => 'صفحه اصلی',
            'EN' => 'Home Page',
            'RU' => 'Главная страница',
            'AR' => 'الصفحة الرئيسية',
            'route' => 'MainWebsite'
        ],

        'SalesOffices' => [
            'FA' => 'دفاتر فروش',
            'EN' => 'Sales Offices',
            'RU' => 'Офисы продаж',
            'AR' => 'مكاتب المبيعات',
            'route' => 'SalesOffices',
        ],

        'Gallery' => [
            'FA' => 'گالری تصاویر',
            'EN' => 'Photo Gallery',
            'RU' => 'Фотогалерея',
            'AR' => 'معرض الصور',
            'route' => 'Gallery',
        ],

    ];
}




//Ptypes list for main menus in website
function Ptypes()
{
    $PtypeList = Ptype::with('contents')->get();

    if ($PtypeList) {
        $Ptypes = [];

        foreach ($PtypeList as $key => $Item) {
            $Ptypes[$key]['id'] = $Item->id;
            $Ptypes[$key]['Text'] = $Item->contents->where('locale', app()->getLocale())->pluck('element_content')[0];
        }
    }
    return $Ptypes;
}



//Menus used in Main Website
// sample:
// {{ Dictionary()['NewProducts'][app()->getLocale()] }}
function Dictionary()
{
    return [
        'language' => [
            'FA' => 'زبان',
            'EN' => 'Language',
            'RU' => 'Язык',
            'AR' => 'لغة',
        ],
        'AboutUs' => [
            'FA' => 'درباره ما',
            'EN' => 'About Us',
            'RU' => 'о нас',
            'AR' => 'معلومات عنا',
        ],
        'Products' => [
            'FA' => 'محصولات',
            'EN' => 'Products',
            'RU' => 'Продукты',
            'AR' => 'منتجات',
        ],
        'NewProducts' => [
            'FA' => 'جدیدترین محصولات',
            'EN' => 'New Products',
            'RU' => 'новые продукты',
            'AR' => 'منتجات جديدة',
        ],
        'ViewProduct' => [
            'FA' => 'مشاهده محصول',
            'EN' => 'View Product',
            'RU' => 'Посмотреть продукт',
            'AR' => 'عرض المنتج',
        ],
        'ProductCataloges' => [
            'FA' => 'کاتالوگ محصولات',
            'EN' => 'Product Catalogs',
            'RU' => 'каталог продукции',
            'AR' => 'كتالوجات المنتجات',
        ],
        'ProductIntro' => [
            'FA' => 'معرفی محصول',
            'EN' => 'Product Introduction',
            'RU' => 'премьера продукта',
            'AR' => 'مقدمة المنتج',
        ],
        'ProductNutrition' => [
            'FA' => 'ارزش غذایی محصول',
            'EN' => 'Nutritional value of the product',
            'RU' => 'Пищевая ценность продукта',
            'AR' => 'القيمة الغذائية للمنتج',
        ],
        'Certificates' => [
            'FA' => 'گواهینامه ها و افتخارات',
            'EN' => 'Certificates',
            'RU' => 'Сертификаты',
            'AR' => 'الشهادات',
        ],
        'Gallery' => [
            'FA' => 'گالری تصاویر',
            'EN' => 'Photo Gallery',
            'RU' => 'Фотогалерея',
            'AR' => 'معرض الصور',
        ],
        'Events' => [
            'FA' => 'رویدادها',
            'EN' => 'Events',
            'RU' => 'События',
            'AR' => 'الأحداث',
        ],
        'ContactUs' => [
            'FA' => 'تماس با ما',
            'EN' => 'Contact Us',
            'RU' => 'Связаться с нами',
            'AR' => 'اتصل بنا',
        ],
        'FollowUs' => [
            'FA' => 'ما را دنبال کنید',
            'EN' => 'Follow Us',
            'RU' => 'Подписывайтесь на нас',
            'AR' => 'تابعنا',
        ],

        'AllRightsReserved' => [
            'FA' => 'تمامی حقوق محفوظ است، طراحی و اجرا واحد انفورماتیک شرکت بستنی اطمینان.',
            'EN' => 'All rights reserved, design and developed by IT department of Etminan Ice Cream Company',
            'RU' => 'Все права защищены, дизайн и разработка отдела ИТ компании Etminan Ice Cream Company.',
            'AR' => 'جميع الحقوق محفوظة ، تصميم وتطوير قسم تقنية المعلومات بشركة Etminan Ice Cream',
        ],

        'Address' => [
            'FA' => 'آذربایجان شرقی، شهرک صنعتی شهید سلیمی',
            'EN' => 'East Azerbaijan, Shahid Salimi Industrial Town',
            'RU' => 'Восточный Азербайджан, Промышленный город Шахид Салими',
            'AR' => 'أذربيجان الشرقية ، مدينة الشهيد سليمي الصناعية',
        ],
        'RandomImgs' => [
            'FA' => 'تصاویر تصادفی',
            'EN' => 'Random Images',
            'RU' => 'Случайные изображения',
            'AR' => 'صور عشوائية',
        ],
        'RelatedProducts' => [
            'FA' => 'محصولات مرتبط',
            'EN' => 'Related Products',
            'RU' => 'сопутствующие товары',
            'AR' => 'منتجات ذات صله',
        ],
        'Name' => [
            'FA' => 'نام',
            'EN' => 'Name',
            'RU' => 'Имя',
            'AR' => 'اسم',
        ],
        'Email' => [
            'FA' => 'ایمیل',
            'EN' => 'Email',
            'RU' => 'е-мейл',
            'AR' => 'البريد الإلكتروني',
        ],
        'Subject' => [
            'FA' => 'موضوع',
            'EN' => 'Subject',
            'RU' => 'Тема',
            'AR' => 'موضوع',
        ],
        'Message' => [
            'FA' => 'متن پیام',
            'EN' => 'Message',
            'RU' => 'Сообщение',
            'AR' => 'رسالة',
        ],
        'Send' => [
            'FA' => 'ارسال',
            'EN' => 'Send',
            'RU' => 'представить',
            'AR' => 'إرسال',
        ],
        'SalesOffices' => [
            'FA' => 'دفاتر فروش',
            'EN' => 'Sales Offices',
            'RU' => 'Офисы продаж',
            'AR' => 'مكاتب المبيعات',
        ],
        'More' => [
            'FA' => 'بیشتر',
            'EN' => 'More',
            'RU' => 'Более',
            'AR' => 'أكثر',
        ],
        'Weight' => [
            'FA' => 'وزن',
            'EN' => 'Weight',
            'RU' => 'Масса',
            'AR' => 'أوزن',
        ],
        'MoreVideos' => [
            'FA' => 'ویدئوهای بیشتر',
            'EN' => 'More Videos',
            'RU' => 'Больше видео',
            'AR' => 'فيديوهات اكثر',
        ],

    ];
}


//================================================================
// Mail section functions

function RootInfo()
{
    $RootInfo['MailServer'] = 'mail.etminan.net';
    $RootInfo['MailAddress'] = Auth::user()->email;
    $RootInfo['MailPass'] = Crypt::decryptString(Auth::user()->mailpass);
    return $RootInfo;
}

function ImapConnection($Folder = '')
{
    $Folder ? $RequestedFolder = 'INBOX.' . $Folder : $RequestedFolder = 'INBOX';
    //Connect to mailbox folder
    $mbox = imap_open("{" . RootInfo()['MailServer'] . ":993/imap/ssl}" . $RequestedFolder, RootInfo()['MailAddress'], RootInfo()['MailPass']);
    return $mbox;
}

function CollectFolderMailsNumber()
{
    $UnreadMsgs = [];
    //Get main list items
    $list = imap_list(ImapConnection(), "{" .  RootInfo()['MailServer'] . "}", "*");
    foreach ($list as $item) {
        //get name of folder
        $Name = preg_split("/[}.]/", $item);
        $FolderName = end($Name);

        // Check inbox and spam folders
        if ($FolderName == 'INBOX' || $FolderName == 'spam') {
            $MC = imap_check(ImapConnection($FolderName));

            // Fetch an reverse sort of overview for all messages in $Folder, default is INBOX
            $AllMailsInFolder = imap_fetch_overview(ImapConnection(), "1:{$MC->Nmsgs}", 0);
            //set unread message for each folder =0
            $UnreadMsgs[$FolderName] = 0;

            if ($AllMailsInFolder) {
                // if emails exist if folder, check to see if theres unseen mail inside mailbox or no
                foreach ($AllMailsInFolder as $mail) {
                    //if unseen mail found, add one to folder unread mail count
                    if (!$mail->seen) {
                        $UnreadMsgs[$FolderName]++;
                    }
                }
            }
        }
    }

    return $UnreadMsgs;
}

//get emails of each folder that user click on it
function ConnectToFolder($Folder = '')
{
    // Check current mailbox
    $MC = imap_check(ImapConnection($Folder));
    // Fetch an reverse sort of overview for all messages in $Folder, default is INBOX
    $result = imap_fetch_overview(ImapConnection(), "1:{$MC->Nmsgs}", 0);


    imap_close(ImapConnection());
    return $result;
}

function UTF8Decoder(string $TextToDecode)
{

    $text = imap_mime_header_decode($TextToDecode);

    $result = '';

    for ($i = 0; $i < count($text); $i++) {

        switch ($text[$i]->charset) {
            case 'iso-8859-1':
                //latin text encoding
                $text[$i]->text = utf8_encode($text[$i]->text);
                break;

            case 'windows-1256':
                $text[$i]->text = iconv('WINDOWS-1256', 'UTF-8', $text[$i]->text);
                break;
        }

        $result .= $text[$i]->text;

        $result = trim(preg_replace('/\s+/', ' ', $result));
    }
    return $result;
}

// //devide name and email address of sender to 2 sectoin to show in inbox list and reply section
// //raw info is look like SENDERNAME <SENDER EMAIL>
function SenderInfo(string $SenderInfo)
{
    $SenderInfo = array_values(array_filter(preg_split("/[<>]/", $SenderInfo)));
    if ($SenderInfo) {
        $SenderInfo['name'] = isset($SenderInfo[0]) ? UTF8Decoder($SenderInfo[0]) : 'NO NAME';
        $SenderInfo['email'] = isset($SenderInfo[1]) ? UTF8Decoder($SenderInfo[1]) : $SenderInfo['name'];
    }
    return $SenderInfo;
}

// //collect number of emails in each

function UserMail($Command)
{
    switch ($Command) {


        case 'GetInboxMailList':

            $MailInfo = [];
            // get mailbox emails in reverse order
            $INBOX = array_reverse(ConnectToFolder(), true);

            foreach ($INBOX as $key => $Item) {

                // fix showing of elements, subject, mail body, from,...
                if ($Item->subject == "") {
                    $Item->subject = "(No Subject)";
                } else {
                    $Item->subject = UTF8Decoder($Item->subject);
                }
                $Item->from = SenderInfo(UTF8Decoder($Item->from))['email'];
            }
            return $INBOX;
            break;

        case 'GetSentMailList':

            $INBOX = ConnectToFolder();
            return $INBOX;
            break;

            // default:
            //     # code...
            //     break;
    }
}