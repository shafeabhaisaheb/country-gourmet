use DBI;
use LWP::Simple;
use URI::URL;
use LWP::UserAgent;
use HTTP::Request;
use HTTP::Response;
use HTTP::Cookies;
use URI::Heuristic;
use HTTP::Request::Common;
use DBI;
use File::Copy;
use Date::Calc qw/Delta_Days/;
use Net::FTP;
use Net::Ping;
use Number::Format;
use Image::Size;

$dbh = DBI->connect('dbi:mysql:country_gourmet','shafea_bhaisaheb','myfriends');

$ua = LWP::UserAgent->new;
$ua->agent("Mozilla/5.0 (Windows; U; Windows NT 5.1; en-GB; rv:1.8.1.6) Gecko/20070725 Firefox/2.0.0.6");
$ua->timeout(30);
$qj = HTTP::Cookies->new();

upload_php();
upload_htmls();
upload_css();
#upload_images();
#build_wamp();

#shafea_bhaisaheb / myfriends

#CREATE USER 'shafea_bhaisaheb'@'localhost' IDENTIFIED BY 'myfriends';

#GRANT ALL PRIVILEGES ON country_gourmet.* TO 'shafea_bhaisaheb'@'localhost';

#----------------------------------------------
sub upload_php(){

    $ftp = Net::FTP->new("www.onestopforseo.com", Debug => 0) or die "Cannot connect to some.host.name: $@";
    $ftp->login("onestopforseo","Myfriends555!") or die "Cannot login ", $ftp->message;
    $ftp->cwd("/public_html/") or die "Cannot change working directory ", $ftp->message;

    system("dir *.php /b > out.txt");


    open(in, "out.txt");
    while(<in>){
        $file = substr($_, 0, length($_)-1);
        $ftp->put($file) or die "put failed ", $ftp->html; print "        Sent file $file\n";
    }

    $ftp->quit;

}

#----------------------------------------------
sub build_wamp(){

    #system("copy D:\\Shafea\\godaddy\\img\\*.*   C:\\wamp\\www\\cg\\img");
    system("copy D:\\Shafea\\godaddy\\*.php   C:\\wamp\\www\\cg");
    system("copy D:\\Shafea\\godaddy\\*.html   C:\\wamp\\www\\cg");
    #system("copy D:\\Shafea\\godaddy\\*.css   C:\\wamp\\www\\cg");

}

#----------------------------------------------
sub upload_images(){

    $ftp = Net::FTP->new("www.onestopforseo.com", Debug => 0) or die "Cannot connect to some.host.name: $@";
    $ftp->login("onestopforseo","Myfriends555!") or die "Cannot login ", $ftp->message;
    $ftp->cwd("/public_html/img") or die "Cannot change working directory ", $ftp->message;
    $ftp->binary;

    $file = "img/logo_white_bg.gif";
    $ftp->put($file) or die "put failed ", $ftp->html; print "        Sent file $file\n";

    $file = "img/cg_breakfast_2.jpg";
    $ftp->put($file) or die "put failed ", $ftp->html; print "        Sent file $file\n";

    $file = "img/cg_soup_2.jpg";
    $ftp->put($file) or die "put failed ", $ftp->html; print "        Sent file $file\n";

    $file = "img/cg_dinner_3.jpg";
    $ftp->put($file) or die "put failed ", $ftp->html; print "        Sent file $file\n";

    $file = "img/cg_breakfast_1.jpg";
    $ftp->put($file) or die "put failed ", $ftp->html; print "        Sent file $file\n";

    $file = "img/cg_lunch_1.jpg";
    $ftp->put($file) or die "put failed ", $ftp->html; print "        Sent file $file\n";

    $file = "img/cg_dinner_2.jpg";
    $ftp->put($file) or die "put failed ", $ftp->html; print "        Sent file $file\n";

    $file = "img/cg_int_1.jpg";
    $ftp->put($file) or die "put failed ", $ftp->html; print "        Sent file $file\n";

    $file = "img/cg_int_2.jpg";
    $ftp->put($file) or die "put failed ", $ftp->html; print "        Sent file $file\n";

    $ftp->quit;

}

#----------------------------------------------
sub upload_css(){

    $ftp = Net::FTP->new("www.onestopforseo.com", Debug => 0) or die "Cannot connect to some.host.name: $@";
    $ftp->login("onestopforseo","Myfriends555!") or die "Cannot login ", $ftp->message;
    $ftp->cwd("/public_html/") or die "Cannot change working directory ", $ftp->message;

    system("dir *.css /b > out.txt");

    open(in, "out.txt");
    while(<in>){
        $file = substr($_, 0, length($_)-1);
        $ftp->put($file) or die "put failed ", $ftp->html; print "        Sent file $file\n";
    }

    $ftp->quit;

}

#----------------------------------------------
sub upload_htmls(){

    $ftp = Net::FTP->new("www.onestopforseo.com", Debug => 0) or die "Cannot connect to some.host.name: $@";
    $ftp->login("onestopforseo","Myfriends555!") or die "Cannot login ", $ftp->message;
    $ftp->cwd("/public_html/") or die "Cannot change working directory ", $ftp->message;

    system("dir *.html /b > out.txt");

    open(in, "out.txt");
    while(<in>){
        $file = substr($_, 0, length($_)-1);
        $ftp->put($file) or die "put failed ", $ftp->html; print "        Sent file $file\n";
    }

    $ftp->quit;

}
