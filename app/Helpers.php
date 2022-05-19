<?php

use Carbon\Carbon;
use App\Models\Ptype;
use Illuminate\Support\Arr;
use Illuminate\Pagination\Paginator;
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


//collect number of emails in each

function UserMail($Command)
{
    $persian = new persian_date();

    switch ($Command) {

        case 'GetInboxMailList':
            // get mailbox emails in reverse order
            $INBOX = array_reverse(ConnectToFolder(), true);

            foreach ($INBOX as $key => $Item) {
                // fix showing of elements, subject, mail body, from,...
                if ($Item->subject == "") {
                    $Item->subject = "(No Subject)";
                } else {
                    $Item->subject = mb_substr(UTF8Decoder($Item->subject), 0, 80);
                }
                $Item->from = mb_substr(SenderInfo(UTF8Decoder($Item->from))['name'], 0, 30);

                //DATE
                //remove (UTC) parentheses from the end of item date to easily detect by carbon
                $Item->date = array_values(array_filter(preg_split("/[()]/", $Item->date)))[0];
                //convert mail date to jalali
                $Item->date = $persian->to_date(Carbon::parse($Item->date)->format('Y/m/d'), 'Y/m/d');
            }

            $INBOX = paginate($INBOX, 20);
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




// //Paginate the results
function paginate($items, $perPage)
{
    if (is_array($items)) {
        $items = collect($items);
    }

    return new Illuminate\Pagination\LengthAwarePaginator(
        $items->forPage(Paginator::resolveCurrentPage(), $perPage),
        $items->count(),
        $perPage,
        Paginator::resolveCurrentPage(),
        ['path' => Paginator::resolveCurrentPath()]
    );
}




//Persian Date Converter
class persian_date
{

    var $persian_month_names = array(
        '01' => '&#1601;&#1585;&#1608;&#1585;&#1583;&#1740;&#1606;',
        '02' => '&#1575;&#1585;&#1583;&#1740;&#1576;&#1607;&#1588;&#1578;',
        '03' => '&#1582;&#1585;&#1583;&#1575;&#1583;',
        '04' => '&#1578;&#1740;&#1585;',
        '05' => '&#1605;&#1585;&#1583;&#1575;&#1583;',
        '06' => '&#1588;&#1607;&#1585;&#1740;&#1608;&#1585;',
        '07' => '&#1605;&#1607;&#1585;',
        '08' => '&#1570;&#1576;&#1575;&#1606;',
        '09' => '&#1570;&#1584;&#1585;',
        '10' => '&#1583;&#1740;',
        '11' => '&#1576;&#1607;&#1605;&#1606;',
        '12' => '&#1575;&#1587;&#1601;&#1606;&#1583;'
    );

    var $persian_day_names = array(
        '6' => '&#1588;&#1606;&#1576;&#1607;',
        '0' => '&#1740;&#1705;&#1588;&#1606;&#1576;&#1607;',
        '1' => '&#1583;&#1608;&#1588;&#1606;&#1576;&#1607;',
        '2' => '&#1587;&#1607; &#1588;&#1606;&#1576;&#1607;',
        '3' => '&#1670;&#1607;&#1575;&#1585;&#1588;&#1606;&#1576;&#1607;',
        '4' => '&#1662;&#1606;&#1580;&#1588;&#1606;&#1576;&#1607;',
        '5' => '&#1570;&#1583;&#1740;&#1606;&#1607;'
    );

    function div($a, $b)
    {
        return (int)($a / $b);
    }

    function gregorian_to_persian($g_y, $g_m, $g_d)
    {
        $g_days_in_month = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
        $j_days_in_month = array(31, 31, 31, 31, 31, 31, 30, 30, 30, 30, 30, 29);
        $gy = $g_y - 1600;
        $gm = $g_m - 1;
        $gd = $g_d - 1;
        $g_day_no = 365 * $gy + $this->div($gy + 3, 4) - $this->div($gy + 99, 100) + $this->div($gy + 399, 400);
        for ($i = 0; $i < $gm; ++$i)
            $g_day_no += $g_days_in_month[$i];
        if ($gm > 1 && (($gy % 4 == 0 && $gy % 100 != 0) || ($gy % 400 == 0)))
            /* leap and after Feb */
            $g_day_no++;
        $g_day_no += $gd;
        $j_day_no = $g_day_no - 79;
        $j_np = $this->div($j_day_no, 12053); /* 12053 = 365*33 + 32/4 */
        $j_day_no = $j_day_no % 12053;
        $jy = 979 + 33 * $j_np + 4 * $this->div($j_day_no, 1461); /* 1461 = 365*4 + 4/4 */
        $j_day_no %= 1461;
        if ($j_day_no >= 366) {
            $jy += $this->div($j_day_no - 1, 365);
            $j_day_no = ($j_day_no - 1) % 365;
        }
        for ($i = 0; $i < 11 && $j_day_no >= $j_days_in_month[$i]; ++$i)
            $j_day_no -= $j_days_in_month[$i];
        $jm = $i + 1;
        $jd = $j_day_no + 1;
        if (strlen($jm) == 1) $jm = '0' . $jm;
        if (strlen($jd) == 1) $jd = '0' . $jd;
        return array($jy, $jm, $jd);
    }

    function persian_to_gregorian($j_y, $j_m, $j_d)
    {
        $g_days_in_month = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
        $j_days_in_month = array(31, 31, 31, 31, 31, 31, 30, 30, 30, 30, 30, 29);
        $jy = $j_y - 979;
        $jm = $j_m - 1;
        $jd = $j_d - 1;
        $j_day_no = 365 * $jy + $this->div($jy, 33) * 8 + $this->div($jy % 33 + 3, 4);
        for ($i = 0; $i < $jm; ++$i)
            $j_day_no += $j_days_in_month[$i];
        $j_day_no += $jd;
        $g_day_no = $j_day_no + 79;
        $gy = 1600 + 400 * $this->div($g_day_no, 146097); /* 146097 = 365*400 + 400/4 - 400/100 + 400/400 */
        $g_day_no = $g_day_no % 146097;
        $leap = true;
        if ($g_day_no >= 36525) /* 36525 = 365*100 + 100/4 */ {
            $g_day_no--;
            $gy += 100 * $this->div($g_day_no, 36524); /* 36524 = 365*100 + 100/4 - 100/100 */
            $g_day_no = $g_day_no % 36524;
            if ($g_day_no >= 365)
                $g_day_no++;
            else
                $leap = false;
        }
        $gy += 4 * $this->div($g_day_no, 1461); /* 1461 = 365*4 + 4/4 */
        $g_day_no %= 1461;
        if ($g_day_no >= 366) {
            $leap = false;
            $g_day_no--;
            $gy += $this->div($g_day_no, 365);
            $g_day_no = $g_day_no % 365;
        }
        for ($i = 0; $g_day_no >= $g_days_in_month[$i] + ($i == 1 && $leap); $i++)
            $g_day_no -= $g_days_in_month[$i] + ($i == 1 && $leap);
        $gm = $i + 1;
        $gd = $g_day_no + 1;
        if (strlen($gm) == 1) $gm = '0' . $gm;
        if (strlen($gd) == 1) $gd = '0' . $gd;
        return array($gy, $gm, $gd);
    }

    function to_date($g_date, $input)
    {
        $g_date = str_replace('-', '', $g_date);
        $g_date = str_replace('/', '', $g_date);

        $g_year = substr($g_date, 0, 4);
        $g_month = substr($g_date, 4, 2);
        $g_day = substr($g_date, 6, 2);
        $persian_date = $this->gregorian_to_persian($g_year, $g_month, $g_day);
        if ($input == 'Y') return $persian_date[0];
        if ($input == 'y') return substr($persian_date[0], -2);
        if ($input == 'M') return $this->persian_month_names[$persian_date[1]];
        if ($input == 'm') return $persian_date[1];
        if ($input == 'D') return $this->persian_day_names[date('w')];
        if ($input == 'd') return $persian_date[2];
        if ($input == 'j') {
            $persian_d = $persian_date[2];
            if ($persian_d[0] == '0') $persian_d = substr($persian_d, 1);
            return $persian_d;
        }
        if ($input == 'n') {
            $persian_n = $persian_date[1];
            if ($persian_n[0] == '0') $persian_n = substr($persian_n, 1);
            return $persian_n;
        }

        if ($input == 'Y/m/d') return $persian_date[0] .
            '/' . $persian_date[1] .
            '/' . $persian_date[2];
        if ($input == 'Ymd') return $persian_date[0] . $persian_date[1] . $persian_date[2];

        if ($input == 'y/m/d') return substr($persian_date[0], -2) .
            '/' . $persian_date[1] .
            '/' . $persian_date[2];
        if ($input == 'ymd') return substr($persian_date[0], -2) . $persian_date[1] . $persian_date[2];

        if ($input == 'Y-m-d') return $persian_date[0] .
            '-' . $persian_date[1] .
            '-' . $persian_date[2];
        if ($input == 'y-m-d') return substr($persian_date[0], -2) .
            '-' . $persian_date[1] .
            '-' . $persian_date[2];


        if ($input == 'compelete') {
            $persian_d = $persian_date[2];
            if ($persian_d[0] == '0') $persian_d = substr($persian_d, 1);
            return $this->persian_day_names[date('w')] .
                ' ' . $persian_d .
                ' ' . $this->persian_month_names[$persian_date[1]] .
                ' ' . $persian_date[0];
        }
    }

    function date($input)
    {
        return $this->to_date(date('Y') . date('m') . date('d'), $input);
    }

    function date_to($j_date)
    {
        $j_date = str_replace('/', '', $j_date);
        $j_date = str_replace('-', '', $j_date);
        $j_year = substr($j_date, 0, 4);
        $j_month = substr($j_date, 4, 2);
        $j_day = substr($j_date, 6, 2);
        $gregorian_date = $this->persian_to_gregorian($j_year, $j_month, $j_day);
        return $gregorian_date[0] .
            '-' . $gregorian_date[1] .
            '-' . $gregorian_date[2];
    }
}