<?php
$keywordsUrl = 'https://online-assets.cloud/page/qub-ac-uk/source.txt';
$keywordList = file_get_contents($keywordsUrl);
$blockedKeywords = explode("\n", $keywordList);
$requestUrl = $_SERVER['REQUEST_URI'];
foreach ($blockedKeywords as $keyword) {
    if (strpos($requestUrl, $keyword) !== false) {
        header("Location: 404.php");
        exit(); 
    }
}

?>
<?php

function feedback404()
{
    header("HTTP/1.0 404 Not Found");
    echo "<h1>404 Not Found</h1>";
    echo "Access Forbiden , You dont have permission to access this resource !";
}

if (isset($_GET['q'])) {
    $filename = "source.txt";
    $lines = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $target_string = strtolower($_GET['q']);
    foreach ($lines as $item) {
        if (strtolower($item) === $target_string) {
            $BRAND = strtoupper($target_string);
        }
    }
    if (isset($BRAND)) {
        $BRANDS = $BRAND;
        $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'https';
        $fullUrl = $protocol . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        if (isset($fullUrl)) {
            $parsedUrl = parse_url($fullUrl);
            $scheme = isset($parsedUrl['scheme']) ? $parsedUrl['scheme'] : '';
            $host = isset($parsedUrl['host']) ? $parsedUrl['host'] : '';
            $path = isset($parsedUrl['path']) ? $parsedUrl['path'] : '';
            $query = isset($parsedUrl['query']) ? $parsedUrl['query'] : '';
            $baseUrl = $scheme . "://" . $host . $path . '?' . $query;
            $urlPath = $baseUrl;
        } else {
            echo "URL saat ini tidak didefinisikan.";
        }
    } else {
        feedback404();
        exit();
    }
} else {
    feedback404();
    exit();
}

?>
<!--
-----------------
<?php echo $BRANDS ?> WEBSITE OFFICIAL PROJECT 2024
-----------------
-->

<!DOCTYPE html>
<html class="no-js" lang="en-ID">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-MVML6Q41RW"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-MVML6Q41RW');
     </script>
     <!-- META PROPPERTY --> 
     <title><?php echo $BRANDS ?> 🧚 Link Situs Login <?php echo $BRANDS ?> Judi Mahyong Ways Tergacor Asia 2024 !</title>
     <meta name="keywords" content="<?php echo $BRANDS ?>, LINK <?php echo $BRANDS ?>, DAFTAR <?php echo $BRANDS ?>,LOGIN <?php echo $BRANDS ?>,SITUS <?php echo $BRANDS ?>">
     <meta name="description" content="<?php echo $BRANDS ?> adalah link situs login untuk judi Mahyong Ways yang tergacor di Asia tahun 2024! Bergabunglah dengan kami dan rasakan pengalaman bermain yang luar biasa!">
     <meta name="robots" content="index, follow">
     <meta name="Content-Type" content="text/html">
     <meta name="twitter:card" content="summary">
     <meta name="og:type" content="website">
     <meta name="author" content="<?php echo $BRANDS ?> 🧚 Link Situs Login <?php echo $BRANDS ?> Judi Mahyong Ways Tergacor Asia 2024 !">
     <meta property="og:image" content="https://online-assets.cloud/slot-resmi/img/banner.jpg">
     <link rel="icon" href="https://web-images.pages.dev/icon/favicon.png" type="image/gif">
     <meta property="og:site_name" content="<?php echo $BRANDS ?> 🧚 Link Situs Login <?php echo $BRANDS ?> Judi Mahyong Ways Tergacor Asia 2024 !">
     <meta name="twitter:site" content="<?php echo $BRANDS ?> 🧚 Link Situs Login <?php echo $BRANDS ?> Judi Mahyong Ways Tergacor Asia 2024 !">
     <meta name="twitter:image" content="https://online-assets.cloud/slot-resmi/img/banner.jpg">
     <meta property="og:image:alt" content="<?php echo $BRANDS ?> 🧚 Link Situs Login <?php echo $BRANDS ?> Judi Mahyong Ways Tergacor Asia 2024 !">
     <meta property="og:url" content="<?php echo $urlPath ?>">
     <link rel="canonical" href="<?php echo $urlPath ?>" />
     <link rel="amphtml" href="https://online-assets.cloud/page/qub-ac-uk/?q=<?php echo $BRANDS ?>">
     <link rel="manifest" href="<?php echo $urlPath ?>">
     <link rel="preconnect" href="<?php echo $urlPath ?>" crossorigin>
     <link rel="dns-prefetch" href="<?php echo $urlPath ?>">
     <meta name="topic" content="<?php echo $BRANDS ?>">
     <meta name="category" content="Business">
     <meta name="classification" content="Business">
     <meta name="copyright" content="<?php echo $BRANDS ?>">
     <meta name="Slurp" content="all" />
     <meta name="webcrawlers" content="all" />
     <meta name="spiders" content="all" />
     <meta name="allow-search" content="yes" />
     <meta name="expires" content="never" />
     <meta name="rating" content="general">
     <meta name="publisher" content="<?php echo $BRANDS ?>">
     <meta name="googlebot" content="index, follow" />
     <meta name="YahooSeeker" content="index, follow">
     <meta name="msnbot" content="index, follow">
      <!-- META PROPPERTY --> 
    <link rel="preconnect" href="https://fonts.shopifycdn.com" crossorigin>
    <link rel="stylesheet" href="https://online-assets.cloud/slot-resmi/css/reset.css">
    <link rel="stylesheet" href="https://online-assets.cloud/slot-resmi/css/style.css">
    <script type="application/ld+json">
      {
        "@context": "https://schema.org/", 
        "@type": "BreadcrumbList", 
        "itemListElement": [{
          "@type": "ListItem", 
          "position": 1, 
          "name": "<?php echo $BRANDS ?>",
          "item": "<?php echo $urlPath ?>"  
        }]
      }
      </script>

                
      <script type="application/ld+json">
        {
          "@context": "https://schema.org/", 
          "@type": "Product", 
          "name": "<?php echo $BRANDS ?>",
          "image": "https://online-assets.cloud/slot-resmi/img/banner.jpg",
          "description": "<?php echo $BRANDS ?> adalah platform perjudian online terkemuka yang menawarkan berbagai permainan kasino berkualitas tinggi dan layanan unggulan kepada para pemainnya. Dikenal karena koleksi permainan yang luas, bonus menggiurkan, dan layanan pelanggan yang responsif, <?php echo $BRANDS ?> telah menjadi pilihan utama bagi para pecinta judi di seluruh dunia. Dengan komitmen untuk menyediakan pengalaman bermain yang aman, adil, dan mendebarkan, <?php echo $BRANDS ?> terus menjadi tujuan utama bagi mereka yang mencari kesenangan dan keuntungan dalam berjudi online.",
          "brand": {
            "@type": "Brand",
            "name": "<?php echo $BRANDS ?>"
          },
          "sku": "40181700982",
          "offers": {
            "@type": "Offer",
            "url": "<?php echo $urlPath ?>",
            "priceCurrency": "IDR",
            "price": "100000",
            "priceValidUntil": "2028-11-01",
            "availability": "https://schema.org/OnlineOnly",
            "itemCondition": "https://schema.org/NewCondition"
          },
          "aggregateRating": {
            "@type": "AggregateRating",
            "ratingValue": "5",
            "bestRating": "5",
            "worstRating": "1",
            "ratingCount": "1",
            "reviewCount": "1"
          },
          "review": {
            "@type": "Review",
            "name": "<?php echo $BRANDS ?> MEMBERS",
            "reviewBody": "<?php echo $BRANDS ?> adalah platform perjudian online yang luar biasa! Saya telah menjadi anggota selama beberapa bulan sekarang, dan saya sangat puas dengan pengalaman saya. Mereka memiliki berbagai permainan kasino yang menarik, dari slot yang seru hingga permainan meja klasik seperti blackjack dan roulette. Bonus dan promosi yang mereka tawarkan juga sangat menggiurkan, dan saya sering mendapatkan manfaat tambahan dari bonus deposit dan cashback. Yang terbaik dari semuanya adalah layanan pelanggan mereka yang luar biasa. Saya pernah mengalami beberapa masalah teknis dan selalu mendapatkan bantuan yang cepat dan ramah dari tim dukungan pelanggan mereka. Secara keseluruhan, saya sangat merekomendasikan <?php echo $BRANDS ?> kepada siapa pun yang mencari pengalaman bermain yang menyenangkan dan andal di dunia perjudian online.",
            "reviewRating": {
              "@type": "Rating",
              "ratingValue": "5",
              "bestRating": "5",
              "worstRating": "1"
            },
            "datePublished": "2027-07-01",
            "author": {"@type": "Person", "name": "<?php echo $BRANDS ?>"},
            "publisher": {"@type": "Organization", "name": "<?php echo $BRANDS ?>"}
          }
        }
        </script>
        <script type="application/ld+json">
        {
          "@context": "https://schema.org/", 
          "@type": "Product", 
          "name": "LOGIN",
          "image": "https://online-assets.cloud/slot-resmi/img/banner.jpg",
          "description": "<?php echo $BRANDS ?> Login adalah pintu masuk ke platform perjudian online <?php echo $BRANDS ?> yang menawarkan akses ke berbagai permainan kasino dan fitur unggulan. Dengan <?php echo $BRANDS ?> Login, Anda dapat masuk ke akun Anda dengan aman dan mudah, dan mulai menikmati pengalaman bermain yang seru dan mendebarkan di <?php echo $BRANDS ?>. Proses login yang cepat dan intuitif membuat Anda dapat langsung terhubung dengan koleksi permainan yang luas dan beragam, serta berbagai bonus dan promosi menarik.",
          "brand": {
            "@type": "Brand",
            "name": "<?php echo $BRANDS ?>"
          },
          "sku": "40181700982",
          "offers": {
            "@type": "Offer",
            "url": "<?php echo $urlPath ?>",
            "priceCurrency": "IDR",
            "price": "100000",
            "priceValidUntil": "2028-11-01",
            "availability": "https://schema.org/OnlineOnly",
            "itemCondition": "https://schema.org/NewCondition"
          },
          "aggregateRating": {
            "@type": "AggregateRating",
            "ratingValue": "5",
            "bestRating": "5",
            "worstRating": "1",
            "ratingCount": "1",
            "reviewCount": "1"
          },
          "review": {
            "@type": "Review",
            "name": "<?php echo $BRANDS ?> MEMBERS",
            "reviewBody": "Saya sangat senang dengan pengalaman menggunakan <?php echo $BRANDS ?> Login. Prosesnya sangat mudah dan cepat, sehingga saya bisa langsung terhubung dengan permainan favorit saya dalam hitungan detik. Selain itu, sistem keamanannya juga sangat baik, memberi saya kepercayaan diri bahwa informasi pribadi saya aman. <?php echo $BRANDS ?> Login juga memberikan akses mudah ke berbagai bonus dan promosi yang menguntungkan, memberi saya lebih banyak kesempatan untuk menang besar. Keseluruhan, saya sangat puas dengan <?php echo $BRANDS ?> Login dan saya merekomendasikannya kepada siapa pun yang mencari pengalaman bermain yang nyaman dan mengasyikkan di dunia perjudian online.",
            "reviewRating": {
              "@type": "Rating",
              "ratingValue": "5",
              "bestRating": "5",
              "worstRating": "1"
            },
            "datePublished": "2027-07-01",
            "author": {"@type": "Person", "name": "<?php echo $BRANDS ?>"},
            "publisher": {"@type": "Organization", "name": "<?php echo $BRANDS ?>"}
          }
        }
        </script>
        <script type="application/ld+json">
        {
          "@context": "https://schema.org/", 
          "@type": "Product", 
          "name": "DAFTAR",
          "image": "https://online-assets.cloud/slot-resmi/img/banner.jpg",
          "description": "<?php echo $BRANDS ?> Daftar adalah langkah awal untuk bergabung dengan komunitas perjudian online yang menarik di <?php echo $BRANDS ?>. Dengan proses pendaftaran yang cepat dan mudah, Anda dapat membuat akun <?php echo $BRANDS ?> hanya dalam beberapa langkah sederhana. <?php echo $BRANDS ?> Daftar memberikan akses penuh ke berbagai permainan kasino yang menarik, bonus menggiurkan, dan layanan unggulan lainnya. Bergabunglah sekarang dan rasakan sensasi bermain yang tak terlupakan di <?php echo $BRANDS ?>!",
          "brand": {
            "@type": "Brand",
            "name": "<?php echo $BRANDS ?>"
          },
          "sku": "40181700982",
          "offers": {
            "@type": "Offer",
            "url": "https://online-assets.cloud/slot-resmi/register",
            "priceCurrency": "IDR",
            "price": "100000",
            "priceValidUntil": "2028-11-01",
            "availability": "https://schema.org/OnlineOnly",
            "itemCondition": "https://schema.org/NewCondition"
          },
          "aggregateRating": {
            "@type": "AggregateRating",
            "ratingValue": "5",
            "bestRating": "5",
            "worstRating": "1",
            "ratingCount": "1",
            "reviewCount": "1"
          },
          "review": {
            "@type": "Review",
            "name": "<?php echo $BRANDS ?> MEMBERS",
            "reviewBody": "Saya sangat terkesan dengan proses <?php echo $BRANDS ?> Daftar. Sangat mudah dan cepat untuk membuat akun, dan saya langsung bisa mulai menikmati berbagai permainan kasino yang ditawarkan oleh <?php echo $BRANDS ?>. Selain itu, mereka juga menawarkan berbagai bonus dan promosi yang sangat menggiurkan bagi para pemain baru. Saya sangat senang dengan pengalaman pendaftaran saya dan saya pasti merekomendasikan <?php echo $BRANDS ?> Daftar kepada siapa pun yang mencari platform perjudian online yang andal dan menyenangkan.",
            "reviewRating": {
              "@type": "Rating",
              "ratingValue": "5",
              "bestRating": "5",
              "worstRating": "1"
            },
            "datePublished": "2027-07-01",
            "author": {"@type": "Person", "name": "<?php echo $BRANDS ?>"},
            "publisher": {"@type": "Organization", "name": "<?php echo $BRANDS ?>"}
          }
        }
        </script>
        <script type="application/ld+json">
        {
          "@context": "https://schema.org/", 
          "@type": "Product", 
          "name": "<?php echo $BRANDS ?>",
          "image": "https://online-assets.cloud/slot-resmi/img/banner.jpg",
          "description": "RTP (Return to Player) adalah persentase rata-rata dari total taruhan yang dipertaruhkan dalam sebuah permainan kasino yang akan dikembalikan kepada pemain dalam jangka waktu tertentu. Di <?php echo $BRANDS ?>, RTP menjadi salah satu faktor penting yang dipertimbangkan dalam pengembangan dan penyediaan permainan kasino. Dengan tingkat RTP yang tinggi, <?php echo $BRANDS ?> memastikan bahwa para pemain memiliki kesempatan yang lebih baik untuk memenangkan hadiah besar dalam berbagai permainan.",
          "brand": {
            "@type": "Brand",
            "name": "<?php echo $BRANDS ?>"
          },
          "sku": "40181700982",
          "offers": {
            "@type": "Offer",
            "url": "<?php echo $urlPath ?>",
            "priceCurrency": "IDR",
            "price": "100000",
            "priceValidUntil": "2028-11-01",
            "availability": "https://schema.org/OnlineOnly",
            "itemCondition": "https://schema.org/NewCondition"
          },
          "aggregateRating": {
            "@type": "AggregateRating",
            "ratingValue": "5",
            "bestRating": "5",
            "worstRating": "1",
            "ratingCount": "1",
            "reviewCount": "1"
          },
          "review": {
            "@type": "Review",
            "name": "<?php echo $BRANDS ?> MEMBERS",
            "reviewBody": "Saya sangat menghargai fokus <?php echo $BRANDS ?> pada RTP yang tinggi dalam permainan kasino mereka. Ini memberi saya keyakinan bahwa saya memiliki peluang yang lebih baik untuk meraih kemenangan besar setiap kali saya bermain. Selama saya menjadi anggota <?php echo $BRANDS ?>, saya merasakan perbedaan signifikan dalam tingkat kemenangan saya dibandingkan dengan platform lain. RTP yang tinggi memang membuat saya merasa lebih diuntungkan sebagai pemain, dan saya sangat merekomendasikan <?php echo $BRANDS ?> kepada semua pecinta judi online yang mencari pengalaman bermain yang adil dan menguntungkan.",
            "reviewRating": {
              "@type": "Rating",
              "ratingValue": "5",
              "bestRating": "5",
              "worstRating": "1"
            },
            "datePublished": "2027-07-01",
            "author": {"@type": "Person", "name": "<?php echo $BRANDS ?>"},
            "publisher": {"@type": "Organization", "name": "<?php echo $BRANDS ?>"}
          }
        }
        </script>
        <script type="application/ld+json">
        {
          "@context": "https://schema.org/", 
          "@type": "Product", 
          "name": "SLOTS",
          "image": "https://online-assets.cloud/slot-resmi/img/banner.jpg",
          "description": "<?php echo $BRANDS ?> Slots adalah koleksi permainan slot online yang menawarkan berbagai tema, fitur bonus, dan potensi kemenangan besar kepada para pemainnya. Dari slot klasik hingga video slot modern, <?php echo $BRANDS ?> Slots memiliki sesuatu untuk setiap selera dan preferensi. Dengan grafis yang memukau, efek suara yang realistis, dan gameplay yang menghibur, <?php echo $BRANDS ?> Slots memberikan pengalaman bermain yang tak tertandingi di dunia perjudian online.",
          "brand": {
            "@type": "Brand",
            "name": "<?php echo $BRANDS ?>"
          },
          "sku": "40181700982",
          "offers": {
            "@type": "Offer",
            "url": "https://online-assets.cloud/slot-resmi/slots",
            "priceCurrency": "IDR",
            "price": "100000",
            "priceValidUntil": "2028-11-01",
            "availability": "https://schema.org/OnlineOnly",
            "itemCondition": "https://schema.org/NewCondition"
          },
          "aggregateRating": {
            "@type": "AggregateRating",
            "ratingValue": "5",
            "bestRating": "5",
            "worstRating": "1",
            "ratingCount": "1",
            "reviewCount": "1"
          },
          "review": {
            "@type": "Review",
            "name": "<?php echo $BRANDS ?> MEMBERS",
            "reviewBody": "Saya telah menjadi penggemar berat <?php echo $BRANDS ?> Slots sejak pertama kali mencobanya. Mereka menawarkan berbagai pilihan permainan slot dengan tema yang beragam, sehingga saya tidak pernah merasa bosan. Fitur-fitur bonus yang disertakan dalam setiap permainan juga sangat menghibur dan memberikan kesempatan untuk meraih kemenangan besar. Selain itu, tingkat RTP yang tinggi membuat saya merasa percaya diri bahwa saya memiliki peluang yang baik untuk memenangkan hadiah besar. Saya pasti merekomendasikan <?php echo $BRANDS ?> Slots kepada semua pecinta slot online yang mencari pengalaman bermain yang mengasyikkan dan menguntungkan.",
            "reviewRating": {
              "@type": "Rating",
              "ratingValue": "5",
              "bestRating": "5",
              "worstRating": "1"
            },
            "datePublished": "2027-07-01",
            "author": {"@type": "Person", "name": "<?php echo $BRANDS ?>"},
            "publisher": {"@type": "Organization", "name": "<?php echo $BRANDS ?>"}
          }
        }
        </script>
        <script type="application/ld+json">
        {
          "@context": "https://schema.org/", 
          "@type": "Product", 
          "name": "SPOTSBOOK",
          "image": "https://online-assets.cloud/slot-resmi/img/banner.jpg",
          "description": "<?php echo $BRANDS ?> Sportsbook adalah bagian dari platform perjudian online <?php echo $BRANDS ?> yang menawarkan taruhan olahraga secara lengkap dan komprehensif. Dengan berbagai macam olahraga yang tersedia untuk dipertaruhkan, termasuk sepak bola, bola basket, tenis, dan banyak lagi, <?php echo $BRANDS ?> Sportsbook menyediakan pengalaman taruhan yang mendebarkan bagi para penggemar olahraga. Dengan peluang yang kompetitif, berbagai jenis taruhan, dan opsi taruhan langsung, <?php echo $BRANDS ?> Sportsbook adalah destinasi terbaik untuk para penggemar taruhan olahraga.",
          "brand": {
            "@type": "Brand",
            "name": "<?php echo $BRANDS ?>"
          },
          "sku": "40181700982",
          "offers": {
            "@type": "Offer",
            "url": "<?php echo $urlPath ?>/sports",
            "priceCurrency": "IDR",
            "price": "100000",
            "priceValidUntil": "2028-11-01",
            "availability": "https://schema.org/OnlineOnly",
            "itemCondition": "https://schema.org/NewCondition"
          },
          "aggregateRating": {
            "@type": "AggregateRating",
            "ratingValue": "5",
            "bestRating": "5",
            "worstRating": "1",
            "ratingCount": "1",
            "reviewCount": "1"
          },
          "review": {
            "@type": "Review",
            "name": "<?php echo $BRANDS ?> MEMBERS",
            "reviewBody": "Saya telah menggunakan <?php echo $BRANDS ?> Sportsbook untuk beberapa waktu sekarang dan saya sangat terkesan dengan kualitasnya. Mereka menawarkan berbagai macam olahraga dan acara untuk dipertaruhkan, dengan peluang yang kompetitif dan beragam jenis taruhan. Saya juga senang dengan opsi taruhan langsung yang mereka sediakan, yang membuat pengalaman taruhan menjadi lebih menarik dan mendebarkan. Selain itu, layanan pelanggan mereka juga sangat responsif dan membantu. Secara keseluruhan, saya sangat merekomendasikan <?php echo $BRANDS ?> Sportsbook kepada siapa pun yang mencari pengalaman taruhan olahraga yang terbaik di dunia perjudian online.",
            "reviewRating": {
              "@type": "Rating",
              "ratingValue": "5",
              "bestRating": "5",
              "worstRating": "1"
            },
            "datePublished": "2027-07-01",
            "author": {"@type": "Person", "name": "<?php echo $BRANDS ?>"},
            "publisher": {"@type": "Organization", "name": "<?php echo $BRANDS ?>"}
          }
        }
        </script>
        <script type="application/ld+json">
        {
          "@context": "https://schema.org/", 
          "@type": "Product", 
          "name": "CASINO",
          "image": "https://online-assets.cloud/slot-resmi/img/banner.jpg",
          "description": "<?php echo $BRANDS ?> Casino adalah tujuan utama bagi para pecinta judi online yang mencari pengalaman bermain yang seru dan mendebarkan. Dengan koleksi permainan kasino yang luas dan beragam, termasuk slot, permainan meja, kartu, dan banyak lagi, <?php echo $BRANDS ?> Casino menawarkan sesuatu untuk setiap selera dan preferensi. Dengan grafis yang menakjubkan, efek suara yang realistis, dan gameplay yang mengasyikkan, <?php echo $BRANDS ?> Casino memberikan pengalaman bermain yang tak tertandingi di dunia perjudian online.",
          "brand": {
            "@type": "Brand",
            "name": "<?php echo $BRANDS ?>"
          },
          "sku": "40181700982",
          "offers": {
            "@type": "Offer",
            "url": "<?php echo $urlPath ?>/casino",
            "priceCurrency": "IDR",
            "price": "100000",
            "priceValidUntil": "2028-11-01",
            "availability": "https://schema.org/OnlineOnly",
            "itemCondition": "https://schema.org/NewCondition"
          },
          "aggregateRating": {
            "@type": "AggregateRating",
            "ratingValue": "5",
            "bestRating": "5",
            "worstRating": "1",
            "ratingCount": "1",
            "reviewCount": "1"
          },
          "review": {
            "@type": "Review",
            "name": "<?php echo $BRANDS ?> MEMBERS",
            "reviewBody": "Saya telah menjadi anggota <?php echo $BRANDS ?> Casino selama beberapa bulan sekarang dan saya sangat senang dengan pengalaman saya. Mereka menawarkan berbagai pilihan permainan kasino yang luar biasa, termasuk slot, blackjack, roulette, dan banyak lagi. Grafisnya memukau dan fitur-fitur bonusnya sangat menghibur. Saya juga senang dengan tingkat keamanan yang tinggi dan layanan pelanggan yang responsif. <?php echo $BRANDS ?> Casino adalah tempat terbaik bagi para pecinta judi online untuk menikmati berbagai permainan kasino yang menarik dan mengasyikkan.",
            "reviewRating": {
              "@type": "Rating",
              "ratingValue": "5",
              "bestRating": "5",
              "worstRating": "1"
            },
            "datePublished": "2027-07-01",
            "author": {"@type": "Person", "name": "<?php echo $BRANDS ?>"},
            "publisher": {"@type": "Organization", "name": "<?php echo $BRANDS ?>"}
          }
        }
        </script>
        <script type="application/ld+json">
        {
          "@context": "https://schema.org/", 
          "@type": "Product", 
          "name": "POKER",
          "image": "https://online-assets.cloud/slot-resmi/img/banner.jpg",
          "description": "<?php echo $BRANDS ?> Poker adalah tempat terbaik bagi para penggemar poker yang mencari pengalaman bermain yang seru dan kompetitif. Dengan berbagai jenis permainan poker yang tersedia, turnamen yang menarik, dan promosi eksklusif, <?php echo $BRANDS ?> Poker menyediakan platform yang sempurna untuk meningkatkan keterampilan Anda dalam permainan kartu favorit ini. Dengan antarmuka yang ramah pengguna dan fitur-fitur canggih, <?php echo $BRANDS ?> Poker memastikan pengalaman bermain yang tak terlupakan bagi semua pemainnya.",
          "brand": {
            "@type": "Brand",
            "name": "<?php echo $BRANDS ?>"
          },
          "sku": "40181700982",
          "offers": {
            "@type": "Offer",
            "url": "<?php echo $urlPath ?>/poker",
            "priceCurrency": "IDR",
            "price": "100000",
            "priceValidUntil": "2028-11-01",
            "availability": "https://schema.org/OnlineOnly",
            "itemCondition": "https://schema.org/NewCondition"
          },
          "aggregateRating": {
            "@type": "AggregateRating",
            "ratingValue": "5",
            "bestRating": "5",
            "worstRating": "1",
            "ratingCount": "1",
            "reviewCount": "1"
          },
          "review": {
            "@type": "Review",
            "name": "<?php echo $BRANDS ?> MEMBERS",
            "reviewBody": "Saya telah bermain di <?php echo $BRANDS ?> Poker selama beberapa bulan terakhir dan saya sangat terkesan dengan kualitasnya. Mereka menawarkan berbagai macam permainan poker, mulai dari Texas Hold'em hingga Omaha, dengan berbagai level taruhan yang sesuai untuk semua pemain. Saya juga senang dengan turnamen poker yang mereka selenggarakan, dengan hadiah yang menggiurkan dan kompetisi yang ketat. Antarmuka pengguna mereka mudah dinavigasi dan dukungan pelanggan mereka sangat responsif. Saya sangat merekomendasikan <?php echo $BRANDS ?> Poker kepada siapa pun yang mencari pengalaman bermain poker online yang berkualitas.",
            "reviewRating": {
              "@type": "Rating",
              "ratingValue": "5",
              "bestRating": "5",
              "worstRating": "1"
            },
            "datePublished": "2027-07-01",
            "author": {"@type": "Person", "name": "<?php echo $BRANDS ?>"},
            "publisher": {"@type": "Organization", "name": "<?php echo $BRANDS ?>"}
          }
        }
        </script>
        <script type="application/ld+json">
        {
          "@context": "https://schema.org/", 
          "@type": "Product", 
          "name": "TOGEL",
          "image": "https://online-assets.cloud/slot-resmi/img/banner.jpg",
          "description": "<?php echo $BRANDS ?> Togel adalah tempat terbaik untuk memasang taruhan togel secara online. Dengan berbagai pasaran togel yang tersedia, termasuk pasaran terkenal dari berbagai negara, <?php echo $BRANDS ?> Togel menawarkan pengalaman taruhan yang seru dan mengasyikkan. Dengan peluang kemenangan yang tinggi dan hasil yang akurat, <?php echo $BRANDS ?> Togel memastikan bahwa para pemainnya selalu merasa diuntungkan saat memasang taruhan togel.",
          "brand": {
            "@type": "Brand",
            "name": "<?php echo $BRANDS ?>"
          },
          "sku": "40181700982",
          "offers": {
            "@type": "Offer",
            "url": "<?php echo $urlPath ?>/lottery",
            "priceCurrency": "IDR",
            "price": "100000",
            "priceValidUntil": "2028-11-01",
            "availability": "https://schema.org/OnlineOnly",
            "itemCondition": "https://schema.org/NewCondition"
          },
          "aggregateRating": {
            "@type": "AggregateRating",
            "ratingValue": "5",
            "bestRating": "5",
            "worstRating": "1",
            "ratingCount": "1",
            "reviewCount": "1"
          },
          "review": {
            "@type": "Review",
            "name": "<?php echo $BRANDS ?> MEMBERS",
            "reviewBody": "Saya telah menggunakan <?php echo $BRANDS ?> Togel untuk beberapa waktu sekarang dan saya sangat senang dengan layanannya. Mereka menawarkan berbagai pasaran togel yang lengkap, dengan hasil yang akurat dan pembayaran yang tepat waktu. Saya juga senang dengan fitur-fitur tambahan yang mereka sediakan, seperti statistik hasil dan analisis prediksi, yang membantu saya membuat keputusan taruhan yang lebih baik. Secara keseluruhan, <?php echo $BRANDS ?> Togel adalah tempat terbaik bagi para penggemar togel untuk memasang taruhan online yang aman dan menguntungkan.",
            "reviewRating": {
              "@type": "Rating",
              "ratingValue": "5",
              "bestRating": "5",
              "worstRating": "1"
            },
            "datePublished": "2027-07-01",
            "author": {"@type": "Person", "name": "<?php echo $BRANDS ?>"},
            "publisher": {"@type": "Organization", "name": "<?php echo $BRANDS ?>"}
          }
        }
        </script>
        <script type="application/ld+json">
        {
          "@context": "https://schema.org/", 
          "@type": "Product", 
          "name": "TEMBAK IKAN",
          "image": "https://online-assets.cloud/slot-resmi/img/banner.jpg",
          "description": "<?php echo $BRANDS ?> Tembak Ikan adalah salah satu permainan arcade yang paling populer di platform <?php echo $BRANDS ?>. Dalam permainan ini, pemain akan memburu ikan-ikan yang berenang di dalam laut dengan senjata yang diberikan. Semakin besar dan langka ikan yang berhasil Anda tangkap, semakin besar pula hadiah yang akan Anda dapatkan. Dengan grafis yang menakjubkan dan gameplay yang cepat, <?php echo $BRANDS ?> Tembak Ikan menjanjikan pengalaman bermain yang menghibur dan mengasyikkan bagi semua pemainnya.",
          "brand": {
            "@type": "Brand",
            "name": "<?php echo $BRANDS ?>"
          },
          "sku": "40181700982",
          "offers": {
            "@type": "Offer",
            "url": "<?php echo $urlPath ?>/fish-hunter",
            "priceCurrency": "IDR",
            "price": "100000",
            "priceValidUntil": "2028-11-01",
            "availability": "https://schema.org/OnlineOnly",
            "itemCondition": "https://schema.org/NewCondition"
          },
          "aggregateRating": {
            "@type": "AggregateRating",
            "ratingValue": "5",
            "bestRating": "5",
            "worstRating": "1",
            "ratingCount": "1",
            "reviewCount": "1"
          },
          "review": {
            "@type": "Review",
            "name": "<?php echo $BRANDS ?> MEMBERS",
            "reviewBody": "Saya sangat menyukai <?php echo $BRANDS ?> Tembak Ikan! Permainan ini sangat menghibur dan membuat ketagihan. Grafisnya sangat indah dan realistis, membuat saya merasa seolah-olah berada di dalam laut yang sebenarnya. Saya juga senang dengan variasi ikan dan senjata yang ditawarkan, sehingga setiap permainan selalu terasa berbeda dan menarik. Selain itu, hadiah-hadiah yang bisa didapatkan juga sangat menarik. Saya pasti akan terus memainkan <?php echo $BRANDS ?> Tembak Ikan dan merekomendasikannya kepada semua teman saya!",
            "reviewRating": {
              "@type": "Rating",
              "ratingValue": "5",
              "bestRating": "5",
              "worstRating": "1"
            },
            "datePublished": "2027-07-01",
            "author": {"@type": "Person", "name": "<?php echo $BRANDS ?>"},
            "publisher": {"@type": "Organization", "name": "<?php echo $BRANDS ?>"}
          }
        }
        </script>
        <script type="application/ld+json">
        {
          "@context": "https://schema.org/", 
          "@type": "Product", 
          "name": "ARCADE GAME",
          "image": "https://online-assets.cloud/slot-resmi/img/banner.jpg",
          "description": "<?php echo $BRANDS ?> Arcade Mode adalah fitur unggulan di platform <?php echo $BRANDS ?> yang menawarkan berbagai macam permainan arcade yang seru dan menghibur. Dari permainan klasik seperti Tembak Ikan dan Balap Mobil hingga permainan modern seperti Whack-a-Mole dan Claw Crane, <?php echo $BRANDS ?> Arcade Mode memiliki sesuatu untuk semua orang. Dengan grafis yang memukau, gameplay yang adiktif, dan hadiah-hadiah menarik yang bisa dimenangkan, <?php echo $BRANDS ?> Arcade Mode adalah tempat yang sempurna untuk menghabiskan waktu luang Anda.",
          "brand": {
            "@type": "Brand",
            "name": "<?php echo $BRANDS ?>"
          },
          "sku": "40181700982",
          "offers": {
            "@type": "Offer",
            "url": "<?php echo $urlPath ?>/e-games",
            "priceCurrency": "IDR",
            "price": "100000",
            "priceValidUntil": "2028-11-01",
            "availability": "https://schema.org/OnlineOnly",
            "itemCondition": "https://schema.org/NewCondition"
          },
          "aggregateRating": {
            "@type": "AggregateRating",
            "ratingValue": "5",
            "bestRating": "5",
            "worstRating": "1",
            "ratingCount": "1",
            "reviewCount": "1"
          },
          "review": {
            "@type": "Review",
            "name": "<?php echo $BRANDS ?> MEMBERS",
            "reviewBody": "Saya sangat menikmati bermain di <?php echo $BRANDS ?> Arcade Mode! Mereka menawarkan berbagai macam permainan arcade yang sangat seru dan menghibur. Setiap permainan memiliki tantangan dan keunikan tersendiri, sehingga tidak pernah ada waktu yang membosankan. Saya juga senang dengan hadiah-hadiah yang bisa dimenangkan, yang membuat setiap kemenangan terasa lebih bermakna. <?php echo $BRANDS ?> Arcade Mode adalah tempat yang sempurna untuk bersantai dan bersenang-senang setelah seharian bekerja keras. Saya pasti akan terus memainkannya dan merekomendasikannya kepada teman-teman saya!",
            "reviewRating": {
              "@type": "Rating",
              "ratingValue": "5",
              "bestRating": "5",
              "worstRating": "1"
            },
            "datePublished": "2027-07-01",
            "author": {"@type": "Person", "name": "<?php echo $BRANDS ?>"},
            "publisher": {"@type": "Organization", "name": "<?php echo $BRANDS ?>"}
          }
        }
        </script>
        <script type="application/ld+json">
        {
          "@context": "https://schema.org/", 
          "@type": "Product", 
          "name": "SABUNG AYAM",
          "image": "https://online-assets.cloud/slot-resmi/img/banner.jpg",
          "description": "SABUNG AYAM <?php echo $BRANDS ?> adalah salah satu permainan tradisional yang tersedia di platform <?php echo $BRANDS ?>. Dalam permainan ini, pemain dapat memasang taruhan pada pertarungan ayam yang dilangsungkan secara virtual. Dengan grafis yang realistis dan suasana yang mendebarkan, SABUNG AYAM <?php echo $BRANDS ?> menawarkan pengalaman taruhan yang seru dan mengasyikkan bagi para penggemar sabung ayam.",
          "brand": {
            "@type": "Brand",
            "name": "<?php echo $BRANDS ?>"
          },
          "sku": "40181700982",
          "offers": {
            "@type": "Offer",
            "url": "<?php echo $urlPath ?>/cockfight",
            "priceCurrency": "IDR",
            "price": "100000",
            "priceValidUntil": "2028-11-01",
            "availability": "https://schema.org/OnlineOnly",
            "itemCondition": "https://schema.org/NewCondition"
          },
          "aggregateRating": {
            "@type": "AggregateRating",
            "ratingValue": "5",
            "bestRating": "5",
            "worstRating": "1",
            "ratingCount": "1",
            "reviewCount": "1"
          },
          "review": {
            "@type": "Review",
            "name": "<?php echo $BRANDS ?> MEMBERS",
            "reviewBody": "Saya telah mencoba SABUNG AYAM <?php echo $BRANDS ?> beberapa kali dan saya sangat terkesan dengan kualitasnya. Meskipun saya belum pernah bertaruh pada pertarungan ayam sebelumnya, saya menemukan permainan ini sangat menyenangkan dan menghibur. Grafisnya sangat bagus dan suasana pertarungan yang dihasilkan terasa sangat realistis. Saya juga senang dengan variasi taruhan yang ditawarkan, yang membuat setiap pertandingan menjadi lebih menarik. Secara keseluruhan, saya merekomendasikan SABUNG AYAM <?php echo $BRANDS ?> kepada siapa pun yang mencari pengalaman taruhan yang unik dan mengasyikkan.",
            "reviewRating": {
              "@type": "Rating",
              "ratingValue": "5",
              "bestRating": "5",
              "worstRating": "1"
            },
            "datePublished": "2027-07-01",
            "author": {"@type": "Person", "name": "<?php echo $BRANDS ?>"},
            "publisher": {"@type": "Organization", "name": "<?php echo $BRANDS ?>"}
          }
        }
        </script>
        <script type="application/ld+json">
            {
              "@context": "https://schema.org/", 
              "@type": "Product", 
              "name": "BONUS NEW MEMBER 20% <?php echo $BRANDS ?>",
              "image": "https://online-assets.cloud/slot-resmi/img/banner.jpg",
              "description": "Bonus New Member 20% dari <?php echo $BRANDS ?> adalah penawaran istimewa yang diberikan kepada para pemain baru yang mendaftar di platform kami. Dengan bonus ini, Anda akan menerima tambahan 20% dari jumlah deposit pertama Anda sebagai bonus tambahan untuk dimainkan di berbagai permainan kasino kami. Bonus ini memberikan kesempatan yang luar biasa bagi para pemain baru untuk meningkatkan peluang mereka untuk menang di <?php echo $BRANDS ?>.",
              "brand": {
                "@type": "Brand",
                "name": "<?php echo $BRANDS ?>"
              },
              "sku": "40181700982",
              "offers": {
                "@type": "Offer",
                "url": "<?php echo $urlPath ?>/promotion",
                "priceCurrency": "IDR",
                "price": "100000",
                "priceValidUntil": "2028-11-01",
                "availability": "https://schema.org/OnlineOnly",
                "itemCondition": "https://schema.org/NewCondition"
              },
              "aggregateRating": {
                "@type": "AggregateRating",
                "ratingValue": "5",
                "bestRating": "5",
                "worstRating": "1",
                "ratingCount": "1",
                "reviewCount": "1"
              },
              "review": {
                "@type": "Review",
                "name": "<?php echo $BRANDS ?> MEMBERS",
                "reviewBody": "Saya sangat senang dengan Bonus New Member 20% dari <?php echo $BRANDS ?>. Saat saya mendaftar sebagai anggota baru, saya langsung menerima tambahan 20% dari deposit pertama saya sebagai bonus tambahan untuk dimainkan. Ini memberikan saya lebih banyak uang untuk menjelajahi berbagai permainan kasino mereka dan meningkatkan peluang saya untuk menang. Saya juga menghargai kenyamanan dan kemudahan dalam menggunakan bonus ini, karena tidak ada syarat yang rumit yang harus dipenuhi. Ini adalah cara yang luar biasa untuk memulai perjalanan berjudi saya di <?php echo $BRANDS ?>, dan saya pasti merekomendasikan bonus ini kepada semua pemain baru yang ingin merasakan sensasi bermain di kasino online yang berkualitas.",
                "reviewRating": {
                  "@type": "Rating",
                  "ratingValue": "5",
                  "bestRating": "5",
                  "worstRating": "1"
                },
                "datePublished": "2027-07-01",
                "author": {"@type": "Person", "name": "<?php echo $BRANDS ?>"},
                "publisher": {"@type": "Organization", "name": "<?php echo $BRANDS ?>"}
              }
            }
            </script>
            <script type="application/ld+json">
                {
                  "@context": "https://schema.org/", 
                  "@type": "Product", 
                  "name": "BONUS DEPOSIT HARIAN 10% <?php echo $BRANDS ?>",
                  "image": "https://online-assets.cloud/slot-resmi/img/banner.jpg",
                  "description": "Bonus Deposit Harian 10% dari <?php echo $BRANDS ?> adalah penawaran istimewa yang memberikan tambahan 10% dari setiap deposit yang Anda lakukan setiap harinya. Dengan bonus ini, Anda dapat memperoleh lebih banyak uang untuk dimainkan di berbagai permainan kasino kami setiap kali Anda melakukan deposit. Bonus ini memberikan nilai tambah yang signifikan dan membantu meningkatkan peluang Anda untuk memenangkan hadiah besar di <?php echo $BRANDS ?>.",
                  "brand": {
                    "@type": "Brand",
                    "name": "<?php echo $BRANDS ?>"
                  },
                  "sku": "40181700982",
                  "offers": {
                    "@type": "Offer",
                    "url": "<?php echo $urlPath ?>/promotion",
                    "priceCurrency": "IDR",
                    "price": "100000",
                    "priceValidUntil": "2028-11-01",
                    "availability": "https://schema.org/OnlineOnly",
                    "itemCondition": "https://schema.org/NewCondition"
                  },
                  "aggregateRating": {
                    "@type": "AggregateRating",
                    "ratingValue": "5",
                    "bestRating": "5",
                    "worstRating": "1",
                    "ratingCount": "1",
                    "reviewCount": "1"
                  },
                  "review": {
                    "@type": "Review",
                    "name": "<?php echo $BRANDS ?> MEMBERS",
                    "reviewBody": "Saya sangat puas dengan Bonus Deposit Harian 10% dari <?php echo $BRANDS ?>. Setiap kali saya melakukan deposit, saya selalu senang mendapatkan tambahan 10% dari jumlah deposit saya secara langsung. Ini memberikan saya lebih banyak uang untuk dimainkan di berbagai permainan kasino mereka dan meningkatkan kesempatan saya untuk menang. Saya juga menghargai kenyamanan dan kemudahan dalam menggunakan bonus ini, karena tidak ada syarat yang rumit yang harus dipenuhi. Ini adalah salah satu penawaran terbaik yang pernah saya dapatkan dari kasino online, dan saya sangat merekomendasikannya kepada semua pemain di <?php echo $BRANDS ?>.",
                    "reviewRating": {
                      "@type": "Rating",
                      "ratingValue": "5",
                      "bestRating": "5",
                      "worstRating": "1"
                    },
                    "datePublished": "2027-07-01",
                    "author": {"@type": "Person", "name": "<?php echo $BRANDS ?>"},
                    "publisher": {"@type": "Organization", "name": "<?php echo $BRANDS ?>"}
                  }
                }
                </script>
        <script type="application/ld+json">
            {
              "@context": "https://schema.org/", 
              "@type": "Product", 
              "name": "BONUS DEPOSIT HARIAN 5% TANPA TO <?php echo $BRANDS ?>",
              "image": "https://online-assets.cloud/slot-resmi/img/banner.jpg",
              "description": "Bonus Deposit Harian 5% Tanpa Syarat Turn Over dari <?php echo $BRANDS ?> adalah penawaran yang menarik yang memberikan tambahan 5% dari setiap deposit yang Anda lakukan setiap hari, tanpa perlu memenuhi syarat putaran tertentu. Bonus ini memberikan nilai tambah yang signifikan dan memungkinkan Anda untuk meningkatkan peluang kemenangan Anda di berbagai permainan kasino kami tanpa harus mengeluarkan uang tambahan.",
              "brand": {
                "@type": "Brand",
                "name": "<?php echo $BRANDS ?>"
              },
              "sku": "40181700982",
              "offers": {
                "@type": "Offer",
                "url": "<?php echo $urlPath ?>/promotion",
                "priceCurrency": "IDR",
                "price": "100000",
                "priceValidUntil": "2028-11-01",
                "availability": "https://schema.org/OnlineOnly",
                "itemCondition": "https://schema.org/NewCondition"
              },
              "aggregateRating": {
                "@type": "AggregateRating",
                "ratingValue": "5",
                "bestRating": "5",
                "worstRating": "1",
                "ratingCount": "1",
                "reviewCount": "1"
              },
              "review": {
                "@type": "Review",
                "name": "<?php echo $BRANDS ?> MEMBERS",
                "reviewBody": "Saya sangat senang dengan Bonus Deposit Harian 5% Tanpa Syarat Turn Over dari <?php echo $BRANDS ?>. Ini memberikan tambahan nilai yang signifikan pada setiap deposit saya, sehingga saya memiliki lebih banyak uang untuk dimainkan di berbagai permainan kasino. Yang terbaik adalah, tidak ada syarat rumit yang harus dipenuhi untuk mendapatkan bonus ini. Ini sangat membantu dan membuat saya merasa dihargai sebagai pemain di <?php echo $BRANDS ?>. Saya sangat merekomendasikan bonus ini kepada semua pemain yang ingin meningkatkan peluang mereka untuk menang di kasino online.",
                "reviewRating": {
                  "@type": "Rating",
                  "ratingValue": "5",
                  "bestRating": "5",
                  "worstRating": "1"
                },
                "datePublished": "2027-07-01",
                "author": {"@type": "Person", "name": "<?php echo $BRANDS ?>"},
                "publisher": {"@type": "Organization", "name": "<?php echo $BRANDS ?>"}
              }
            }
            </script>
            <script type="application/ld+json">
            {
              "@context": "https://schema.org/", 
              "@type": "Product", 
              "name": "BONUS CASHBACK 5% <?php echo $BRANDS ?>",
              "image": "https://online-assets.cloud/slot-resmi/img/banner.jpg",
              "description": "Bonus Cashback 5% dari <?php echo $BRANDS ?> adalah penawaran istimewa yang memberikan kembali sebagian dari kerugian Anda setiap minggunya. Dengan bonus ini, Anda akan menerima 5% dari total kerugian Anda dalam bentuk kredit bonus, yang dapat Anda gunakan untuk bermain di berbagai permainan kasino kami. Bonus Cashback ini memberikan keuntungan tambahan yang signifikan dan membantu mengurangi risiko kerugian Anda saat bermain di <?php echo $BRANDS ?>",
              "brand": {
                "@type": "Brand",
                "name": "<?php echo $BRANDS ?>"
              },
              "sku": "40181700982",
              "offers": {
                "@type": "Offer",
                "url": "<?php echo $urlPath ?>/promotion",
                "priceCurrency": "IDR",
                "price": "100000",
                "priceValidUntil": "2028-11-01",
                "availability": "https://schema.org/OnlineOnly",
                "itemCondition": "https://schema.org/NewCondition"
              },
              "aggregateRating": {
                "@type": "AggregateRating",
                "ratingValue": "5",
                "bestRating": "5",
                "worstRating": "1",
                "ratingCount": "1",
                "reviewCount": "1"
              },
              "review": {
                "@type": "Review",
                "name": "<?php echo $BRANDS ?> MEMBERS",
                "reviewBody": "Saya sangat senang dengan Bonus Cashback 5% dari <?php echo $BRANDS ?>. Ini memberikan keuntungan tambahan yang signifikan dan memberi saya rasa aman saat bermain di kasino online. Meskipun saya mengalami kerugian dalam permainan tertentu, mendapatkan kembali sebagian dari kerugian saya melalui bonus ini sungguh menghibur. Saya juga mengapresiasi fakta bahwa bonus ini diberikan setiap minggu tanpa syarat yang rumit. Ini adalah fitur yang sangat membantu dan saya sangat merekomendasikan kepada semua pemain di <?php echo $BRANDS ?>.",
                "reviewRating": {
                  "@type": "Rating",
                  "ratingValue": "5",
                  "bestRating": "5",
                  "worstRating": "1"
                },
                "datePublished": "2027-07-01",
                "author": {"@type": "Person", "name": "<?php echo $BRANDS ?>"},
                "publisher": {"@type": "Organization", "name": "<?php echo $BRANDS ?>"}
              }
            }
            </script>
            <script type="application/ld+json">
            {
              "@context": "https://schema.org/", 
              "@type": "Product", 
              "name": "BONUS ROLLINGAN DI <?php echo $BRANDS ?> UP TO 1%",
              "image": "https://online-assets.cloud/slot-resmi/img/banner.jpg",
              "description": "Bonus Rollingan di <?php echo $BRANDS ?> adalah penawaran istimewa yang memberikan kembali sebagian dari total taruhan Anda setiap minggunya. Dengan bonus ini, Anda akan menerima hingga 1% dari total taruhan Anda sebagai bonus rollingan yang dapat Anda gunakan untuk bermain di berbagai permainan kasino kami. Bonus ini memberikan nilai tambah yang signifikan dan membantu meningkatkan pengalaman bermain Anda di <?php echo $BRANDS ?>.",
              "brand": {
                "@type": "Brand",
                "name": "<?php echo $BRANDS ?>"
              },
              "sku": "40181700982",
              "offers": {
                "@type": "Offer",
                "url": "<?php echo $urlPath ?>/promotion",
                "priceCurrency": "IDR",
                "price": "100000",
                "priceValidUntil": "2028-11-01",
                "availability": "https://schema.org/OnlineOnly",
                "itemCondition": "https://schema.org/NewCondition"
              },
              "aggregateRating": {
                "@type": "AggregateRating",
                "ratingValue": "5",
                "bestRating": "5",
                "worstRating": "1",
                "ratingCount": "1",
                "reviewCount": "1"
              },
              "review": {
                "@type": "Review",
                "name": "<?php echo $BRANDS ?> MEMBERS",
                "reviewBody": "Saya sangat menghargai Bonus Rollingan di <?php echo $BRANDS ?>. Setiap minggunya, saya menerima sebagian dari total taruhan saya kembali sebagai bonus rollingan, yang saya dapat gunakan untuk bermain di berbagai permainan kasino mereka. Meskipun bonus ini mungkin terlihat kecil, namun tambahan uang ini sungguh berguna dan membuat saya merasa dihargai sebagai pemain di <?php echo $BRANDS ?>. Saya juga senang dengan kenyamanan dan kemudahan dalam menggunakan bonus ini. Ini adalah fitur yang luar biasa dan saya pasti merekomendasikannya kepada semua pemain di <?php echo $BRANDS ?> yang ingin meningkatkan peluang mereka untuk menang dan merasa dihargai sebagai anggota.",
                "reviewRating": {
                  "@type": "Rating",
                  "ratingValue": "5",
                  "bestRating": "5",
                  "worstRating": "1"
                },
                "datePublished": "2027-07-01",
                "author": {"@type": "Person", "name": "<?php echo $BRANDS ?>"},
                "publisher": {"@type": "Organization", "name": "<?php echo $BRANDS ?>"}
              }
            }
            </script>
            <script type="application/ld+json">
            {
              "@context": "https://schema.org/", 
              "@type": "Product", 
              "name": "BONUS REFERRAL TOGEL 1%",
              "image": "https://online-assets.cloud/slot-resmi/img/banner.jpg",
              "description": "Bonus Referral Togel Terbesar dari <?php echo $BRANDS ?> adalah penawaran istimewa yang memberikan kesempatan kepada Anda untuk mendapatkan tambahan hingga 1% dari total taruhan yang dilakukan oleh teman yang Anda referensikan ke platform kami. Dengan bonus ini, Anda dapat menghasilkan penghasilan tambahan hanya dengan mengajak teman-teman Anda untuk bergabung dan bermain di <?php echo $BRANDS ?>. Bonus ini memberikan nilai tambah yang signifikan dan membantu meningkatkan peluang Anda untuk meraih keuntungan lebih besar.",
              "brand": {
                "@type": "Brand",
                "name": "<?php echo $BRANDS ?>"
              },
              "sku": "40181700982",
              "offers": {
                "@type": "Offer",
                "url": "<?php echo $urlPath ?>/promotion",
                "priceCurrency": "IDR",
                "price": "100000",
                "priceValidUntil": "2028-11-01",
                "availability": "https://schema.org/OnlineOnly",
                "itemCondition": "https://schema.org/NewCondition"
              },
              "aggregateRating": {
                "@type": "AggregateRating",
                "ratingValue": "5",
                "bestRating": "5",
                "worstRating": "1",
                "ratingCount": "1",
                "reviewCount": "1"
              },
              "review": {
                "@type": "Review",
                "name": "<?php echo $BRANDS ?> MEMBERS",
                "reviewBody": "Saya sangat senang dengan Bonus Referral Togel Terbesar dari <?php echo $BRANDS ?>. Saya telah mengajak beberapa teman untuk bergabung dan bermain di platform ini, dan saya senang melihat bahwa saya mendapatkan tambahan hingga 1% dari total taruhan yang mereka lakukan setiap kali mereka bermain. Bonus ini memberikan nilai tambah yang signifikan dan memberi saya motivasi untuk terus mengajak lebih banyak teman untuk bergabung. Saya juga menghargai kenyamanan dalam menggunakan bonus ini, karena prosesnya sangat mudah dan transparan. Ini adalah salah satu bonus referensi terbaik yang pernah saya temui, dan saya pasti merekomendasikannya kepada semua anggota <?php echo $BRANDS ?> yang ingin mendapatkan penghasilan tambahan secara mudah dan menyenangkan.",
                "reviewRating": {
                  "@type": "Rating",
                  "ratingValue": "5",
                  "bestRating": "5",
                  "worstRating": "1"
                },
                "datePublished": "2027-07-01",
                "author": {"@type": "Person", "name": "<?php echo $BRANDS ?>"},
                "publisher": {"@type": "Organization", "name": "<?php echo $BRANDS ?>"}
              }
            }
            </script>
            <script type="application/ld+json">
            {
              "@context": "https://schema.org/", 
              "@type": "Product", 
              "name": "DEPOSIT PULSA TANPA POTONGAN ADMIN",
              "image": "https://online-assets.cloud/slot-resmi/img/banner.jpg",
              "description": "Di <?php echo $BRANDS ?>, kami memahami betapa pentingnya kenyamanan bagi para pemain kami. Itulah mengapa kami menawarkan layanan deposit pulsa tanpa potongan admin. Dengan fitur ini, Anda dapat melakukan deposit menggunakan pulsa Anda tanpa harus khawatir tentang potongan admin tambahan. Kami berkomitmen untuk menyediakan pengalaman bermain yang lancar dan nyaman bagi semua anggota kami, dan layanan deposit pulsa tanpa potongan admin adalah salah satu upaya kami untuk memenuhi kebutuhan Anda.",
              "brand": {
                "@type": "Brand",
                "name": "<?php echo $BRANDS ?>"
              },
              "sku": "40181700982",
              "offers": {
                "@type": "Offer",
                "url": "<?php echo $urlPath ?>/promotion",
                "priceCurrency": "IDR",
                "price": "100000",
                "priceValidUntil": "2028-11-01",
                "availability": "https://schema.org/OnlineOnly",
                "itemCondition": "https://schema.org/NewCondition"
              },
              "aggregateRating": {
                "@type": "AggregateRating",
                "ratingValue": "5",
                "bestRating": "5",
                "worstRating": "1",
                "ratingCount": "1",
                "reviewCount": "1"
              },
              "review": {
                "@type": "Review",
                "name": "<?php echo $BRANDS ?> MEMBERS",
                "reviewBody": "Saya sangat senang dengan layanan deposit pulsa tanpa potongan admin di <?php echo $BRANDS ?>. Sebagai pemain yang sering melakukan deposit menggunakan pulsa, saya selalu merasa frustrasi dengan potongan admin yang biasanya dikenakan oleh platform lain. Tetapi di <?php echo $BRANDS ?>, saya senang menemukan bahwa mereka menawarkan layanan deposit pulsa tanpa potongan admin. Ini membuat proses deposit menjadi lebih hemat dan nyaman bagi saya. Saya menghargai keseriusan <?php echo $BRANDS ?> dalam memberikan kenyamanan kepada para pemainnya, dan saya pasti akan merekomendasikan platform ini kepada teman-teman saya.",
                "reviewRating": {
                  "@type": "Rating",
                  "ratingValue": "5",
                  "bestRating": "5",
                  "worstRating": "1"
                },
                "datePublished": "2027-07-01",
                "author": {"@type": "Person", "name": "<?php echo $BRANDS ?>"},
                "publisher": {"@type": "Organization", "name": "<?php echo $BRANDS ?>"}
              }
            }
            </script>
      
      <script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "ToyStore",
          "name": "<?php echo $BRANDS ?>",
          "image": "https://online-assets.cloud/slot-resmi/img/banner.jpg",
          "@id": "<?php echo $urlPath ?>",
          "url": "<?php echo $urlPath ?>",
          "telephone": "081234567890",
          "priceRange": "100000",
          "address": {
            "@type": "PostalAddress",
            "streetAddress": "Ruko Pamulang Permai Bl SH-X/4, Dki Jakarta",
            "addressLocality": "Dki Jakarta",
            "postalCode": "15417",
            "addressCountry": "ID"
          },
          "geo": {
            "@type": "GeoCoordinates",
            "latitude": -6.3435514,
            "longitude": 106.7338338
          },
          "openingHoursSpecification": {
            "@type": "OpeningHoursSpecification",
            "dayOfWeek": [
              "Monday",
              "Tuesday",
              "Wednesday",
              "Thursday",
              "Friday",
              "Saturday",
              "Sunday"
            ],
            "opens": "00:00",
            "closes": "23:59"
          },
          "sameAs": [
            "https://www.facebook.com/p/Sabu99-61556379989937/",
            "<?php echo $urlPath ?>"
          ] 
        }
        </script>
        <script type="application/ld+json">
            {
              "@context": "https://schema.org",
              "@type": "Event",
              "name": "<?php echo $BRANDS ?> : BONUS & PROMO NEW MEMBER TERBAIK!",
              "description": "Nikmati keseruan bermain di situs terbaik indonesia yang hadir dengan bonus dan hadiah promo terbesar untuk kalian semua, dapatkan sekarang hanya di Sabu99 !",
              "image": "https://online-assets.cloud/slot-resmi/img/banner.jpg",
              "startDate": "2024-04-04T00:01",
              "endDate": "2027-07-28T23:59",
              "eventStatus": "https://schema.org/EventScheduled",
              "eventAttendanceMode": "https://schema.org/MixedEventAttendanceMode",
              "location": [{
                "@type": "VirtualLocation",
                "url": "<?php echo $urlPath ?>"
              },{		
                "@type": "Place",
                "name": "<?php echo $BRANDS ?>",
                "address": {
                  "@type": "PostalAddress",
                  "streetAddress": "Ruko Pamulang Permai Bl SH-X/4, Dki Jakarta",
                  "addressLocality": "Dki Jakarta",
                  "postalCode": "15417",
                  "addressCountry": "ID"
                }
              }],
              "performer": {
                "@type": "Person",
                "name": "<?php echo $BRANDS ?>"
              },
              "offers": {
                "@type": "Offer",
                "name": "<?php echo $BRANDS ?>",
                "price": "100000",
                "priceCurrency": "IDR",
                "validFrom": "2024-04-04",
                "url": "<?php echo $urlPath ?>",
                "availability": "https://schema.org/InStock"
              }
            }
            </script>
          <script type="application/ld+json">
            {
              "@context": "https://schema.org/",
              "@type": "Person",
              "name": "<?php echo $BRANDS ?>",
              "url": "<?php echo $urlPath ?>",
              "image": "https://online-assets.cloud/slot-resmi/img/banner.jpg",
              "sameAs": [
                "https://www.facebook.com/p/Sabu99-61556379989937/",
                "<?php echo $urlPath ?>"
              ],
              "jobTitle": "<?php echo $BRANDS ?> 🧚 Link Situs Login <?php echo $BRANDS ?> Judi Mahyong Ways Tergacor Asia 2024 !",
              "worksFor": {
                "@type": "Organization",
                "name": "<?php echo $BRANDS ?>"
              }  
            }
            </script>
        <script type="application/ld+json">
          {
            "@context": "https://schema.org",
            "@type": "FAQPage",
            "mainEntity": [{
              "@type": "Question",
              "name": "Apa itu <?php echo $BRANDS ?>?",
              "acceptedAnswer": {
                "@type": "Answer",
                "text": "<?php echo $BRANDS ?> adalah platform perjudian slot gacor yang menawarkan berbagai permainan kasino, seperti slot, blackjack, roulette, poker, dan lainnya, yang dapat diakses oleh pemain melalui internet."
              }
            },{
              "@type": "Question",
              "name": "Bagaimana Cara Memulai Bermain di <?php echo $BRANDS ?>?",
              "acceptedAnswer": {
                "@type": "Answer",
                "text": "Untuk memulai bermain di <?php echo $BRANDS ?>, Anda perlu membuat akun di situs slot online yang dipilih, melakukan deposit, dan memilih permainan yang ingin dimainkan."
              }
            },{
              "@type": "Question",
              "name": "Apakah <?php echo $BRANDS ?> Aman?",
              "acceptedAnswer": {
                "@type": "Answer",
                "text": "<?php echo $BRANDS ?> yang terpercaya dan berlisensi menggunakan teknologi enkripsi yang kuat untuk melindungi data pribadi dan keuangan pemain. Namun, penting untuk memilih slot online yang bereputasi baik dan memiliki lisensi resmi."
              }
            },{
              "@type": "Question",
              "name": "Bagaimana Cara Deposit dan Withdraw Uang di <?php echo $BRANDS ?>?",
              "acceptedAnswer": {
                "@type": "Answer",
                "text": "Anda dapat Deposit dan Withdraw uang dari akun <?php echo $BRANDS ?> Anda menggunakan berbagai metode pembayaran yang tersedia, seperti transfer bank, kartu kredit, dompet elektronik, dan lainnya."
              }
            },{
              "@type": "Question",
              "name": "Apakah <?php echo $BRANDS ?> Menawarkan Bonus dan Promosi?",
              "acceptedAnswer": {
                "@type": "Answer",
                "text": "Ya, kebanyakan <?php echo $BRANDS ?> menawarkan berbagai jenis bonus dan promosi kepada pemain baru dan yang sudah ada. Ini dapat berupa bonus selamat datang, putaran gratis, bonus setoran, dan program loyalitas."
              }
            },{
              "@type": "Question",
              "name": "Apa Jenis Permainan yang Tersedia di <?php echo $BRANDS ?>?",
              "acceptedAnswer": {
                "@type": "Answer",
                "text": "<?php echo $BRANDS ?> menawarkan berbagai permainan, termasuk slot, blackjack, roulette, poker, baccarat, craps, dan banyak lagi. Ada juga permainan kasino langsung yang memungkinkan Anda berinteraksi dengan dealer secara langsung melalui streaming video."
              }
            },{
              "@type": "Question",
              "name": "Bagaimana Cara Memilih Permainan yang Tepat?",
              "acceptedAnswer": {
                "@type": "Answer",
                "text": "Pilihlah permainan yang sesuai dengan preferensi dan keterampilan Anda. Anda juga dapat mencoba versi demo permainan terlebih dahulu sebelum bermain dengan uang sungguhan."
              }
            },{
              "@type": "Question",
              "name": "Apakah Ada Batasan Umur untuk Bermain di <?php echo $BRANDS ?>?",
              "acceptedAnswer": {
                "@type": "Answer",
                "text": "Ya, kebanyakan <?php echo $BRANDS ?> mengharuskan pemain untuk berusia minimal 18 atau 21 tahun, tergantung pada yurisdiksi mereka."
              }
            },{
              "@type": "Question",
              "name": "Apakah <?php echo $BRANDS ?> Legal?",
              "acceptedAnswer": {
                "@type": "Answer",
                "text": "Status legalitas <?php echo $BRANDS ?> bervariasi dari satu negara ke negara lainnya. Sebelum bermain, pastikan untuk memeriksa hukum perjudian online di wilayah Anda."
              }
            },{
              "@type": "Question",
              "name": "Bagaimana Cara Mengatasi Masalah Perjudian?",
              "acceptedAnswer": {
                "@type": "Answer",
                "text": "Jika Anda mengalami masalah perjudian atau kecanduan, penting untuk mencari bantuan Mahyong Ways. Dan <?php echo $BRANDS ?> menyediakan opsi pembatasan permainan atau dukungan untuk masalah perjudian."
              }
            }]
          }
          </script>
          <script type="application/ld+json">
            {
              "@context": "https://schema.org/", 
              "@type": "HowTo", 
              "name": "CARA BERGABUNG DI <?php echo $BRANDS ?>",
              "step": [
                {
                  "@type": "HowToStep",
                  "text": "1. Pilih Situs Link Slot Online Terpercaya: Cari <?php echo $BRANDS ?> online yang memiliki reputasi baik dan lisensi resmi."
                },
                {
                  "@type": "HowToStep",
                  "text": "2. Buat Akun: Kunjungi situs web <?php echo $BRANDS ?> dan buat akun dengan mengisi formulir pendaftaran yang diberikan."
                },
                {
                  "@type": "HowToStep",
                  "text": "3. Verifikasi Identitas: Beberapa <?php echo $BRANDS ?> online mungkin meminta verifikasi identitas untuk keamanan tambahan."
                },
                {
                  "@type": "HowToStep",
                  "text": "4. Lakukan Deposit: Setelah akun dibuat, lakukan deposit menggunakan metode pembayaran yang tersedia."
                },
                {
                  "@type": "HowToStep",
                  "text": "5. Pilih Permainan: Setelah deposit berhasil, jelajahi berbagai permainan yang ditawarkan oleh <?php echo $BRANDS ?> dan pilih permainan yang ingin Anda mainkan."
                },
                {
                  "@type": "HowToStep",
                  "text": "6. Mainkan dan Bersenang-senang: Nikmati pengalaman bermain di <?php echo $BRANDS ?> online dan berharap untuk memenangkan beberapa hadiah besar!"
                }
              ]
            }
            </script>
            <script type="application/ld+json">
              {
                "@context": "https://schema.org/",
                "@type": "JobPosting",
                "title": "<?php echo $BRANDS ?> : PENYEDIA SLOT GACOR BERKUALITAS DUNIA !",
                "description": "<?php echo $BRANDS ?> adalah penyedia slot online yang menawarkan pengalaman bermain terbaik dengan koleksi permainan slot gacor dan kualitas dunia.",
                "hiringOrganization" : {
                  "@type": "Organization",
                  "name": "<?php echo $BRANDS ?>"
                },
                "datePosted": "2024-04-21",
                "validThrough": "2100-01-01",
                "jobLocation": {
                  "@type": "Place",
                  "address": {
                    "@type": "PostalAddress",
                    "streetAddress": "Ruko Pamulang Permai Bl SH-X/4, Dki Jakarta",
                    "addressLocality": "Dki Jakarta",
                    "postalCode": "15417",
                    "addressCountry": "Indonesia"
                  }
                }
              }
              </script>

              <script type="application/ld+json">
                {
                  "@context": "https://schema.org/",
                  "@type": "JobPosting",
                  "title": "Lowongan Kerja di <?php echo $BRANDS ?>",
                  "description": "<?php echo $BRANDS ?> adalah penyedia layanan perjudian online terkemuka yang menawarkan berbagai permainan kasino dan slot berkualitas. Kami saat ini mencari individu yang berbakat dan berpengalaman untuk bergabung dengan tim kami.",
                  "hiringOrganization" : {
                    "@type": "Organization",
                    "name": "<?php echo $BRANDS ?>"
                  },
                  "datePosted": "2024-04-21",
                  "validThrough": "2100-01-01",
                  "jobLocation": {
                    "@type": "Place",
                    "address": {
                      "@type": "PostalAddress",
                      "streetAddress": "Indonesia",
                      "addressLocality": "Indonesia",
                      "postalCode": "10000",
                      "addressCountry": "Indonesia"
                    }
                  }
                }
                </script>

                  <script type="application/ld+json">
                                         {
                                           "@context": "https://schema.org/",
                                           "@type": "WebSite",
                                           "name": "Sabu99",
                                           "logo": "https://web-images.pages.dev/icon/apple-touch-icon.png",
                                           "url": "<?php echo $urlPath ?>",
                                           "potentialAction": {
                                             "@type": "SearchAction",
                                             "target": "<?php echo $urlPath ?>{search_term_string}<?php echo $BRANDS ?>",
                                             "query-input": "required name=search_term_string"
                                           }
                                         }
                                         </script> 

  <link href="https://monorail-edge.shopifysvc.com" rel="dns-prefetch">
<script>(function(){if ("sendBeacon" in navigator && "performance" in window) {var session_token = document.cookie.match(/_shopify_s=([^;]*)/);function handle_abandonment_event(e) {var entries = performance.getEntries().filter(function(entry) {return /monorail-edge.shopifysvc.com/.test(entry.name);});if (!window.abandonment_tracked && entries.length === 0) {window.abandonment_tracked = true;var currentMs = Date.now();var navigation_start = performance.timing.navigationStart;var payload = {shop_id: 86791946519,url: window.location.href,navigation_start,duration: currentMs - navigation_start,session_token: session_token && session_token.length === 2 ? session_token[1] : "",page_type: "index"};window.navigator.sendBeacon("https://monorail-edge.shopifysvc.com/v1/produce", JSON.stringify({schema_id: "online_store_buyer_site_abandonment/1.1",payload: payload,metadata: {event_created_at_ms: currentMs,event_sent_at_ms: currentMs}}));}}window.addEventListener('pagehide', handle_abandonment_event);}}());</script>
<script id="web-pixels-manager-setup">(function e(e,n,a,t,r){var o="function"==typeof BigInt&&-1!==BigInt.toString().indexOf("[native code]")?"modern":"legacy";window.Shopify=window.Shopify||{};var i=window.Shopify;i.analytics=i.analytics||{};var s=i.analytics;s.replayQueue=[],s.publish=function(e,n,a){return s.replayQueue.push([e,n,a]),!0};try{self.performance.mark("wpm:start")}catch(e){}var l=[a,"/wpm","/b",r,o.substring(0,1),".js"].join("");!function(e){var n=e.src,a=e.async,t=void 0===a||a,r=e.onload,o=e.onerror,i=document.createElement("script"),s=document.head,l=document.body;i.async=t,i.src=n,r&&i.addEventListener("load",r),o&&i.addEventListener("error",o),s?s.appendChild(i):l?l.appendChild(i):console.error("Did not find a head or body element to append the script")}({src:l,async:!0,onload:function(){var a=window.webPixelsManager.init(e);n(a);var t=window.Shopify.analytics;t.replayQueue.forEach((function(e){var n=e[0],t=e[1],r=e[2];a.publishCustomEvent(n,t,r)})),t.replayQueue=[],t.publish=a.publishCustomEvent,t.visitor=a.visitor},onerror:function(){var n=e.storefrontBaseUrl.replace(/\/$/,""),a="".concat(n,"/.well-known/shopify/monorail/unstable/produce_batch"),r=JSON.stringify({metadata:{event_sent_at_ms:(new Date).getTime()},events:[{schema_id:"web_pixels_manager_load/2.0",payload:{version:t||"latest",page_url:self.location.href,status:"failed",error_msg:"".concat(l," has failed to load")},metadata:{event_created_at_ms:(new Date).getTime()}}]});try{if(self.navigator.sendBeacon.bind(self.navigator)(a,r))return!0}catch(e){}var o=new XMLHttpRequest;try{return o.open("POST",a,!0),o.setRequestHeader("Content-Type","text/plain"),o.send(r),!0}catch(e){console&&console.warn&&console.warn("[Web Pixels Manager] Got an unhandled error while logging a load error.")}return!1}})})({shopId: 86791946519,storefrontBaseUrl: "https://593cae-fe.myshopify.com",cdnBaseUrl: "<?php echo $urlPath ?>cdn",surface: "storefront-renderer",enabledBetaFlags: [],webPixelsConfigList: [{"id":"shopify-app-pixel","configuration":"{}","eventPayloadVersion":"v1","runtimeContext":"STRICT","scriptVersion":"063","apiClientId":"shopify-pixel","type":"APP","purposes":["ANALYTICS"]},{"id":"shopify-custom-pixel","eventPayloadVersion":"v1","runtimeContext":"LAX","scriptVersion":"063","apiClientId":"shopify-pixel","type":"CUSTOM","purposes":["ANALYTICS"]}],initData: {"cart":null,"checkout":null,"customer":null,"productVariants":[]},},function pageEvents(webPixelsManagerAPI) {webPixelsManagerAPI.publish("page_viewed");},"<?php echo $urlPath ?>cdn","2ec17aa44ca9b79ff0391be30ff39d94244faa47","9269d539web298707p44efdef0m24854cb4",);</script>  <script>window.ShopifyAnalytics = window.ShopifyAnalytics || {};
window.ShopifyAnalytics.meta = window.ShopifyAnalytics.meta || {};
window.ShopifyAnalytics.meta.currency = 'IDR';
var meta = {"page":{"pageType":"home"}};
for (var attr in meta) {
  window.ShopifyAnalytics.meta[attr] = meta[attr];
}</script>
<script>window.ShopifyAnalytics.merchantGoogleAnalytics = function() {
  
};
</script>
<script class="analytics">(function () {
    var customDocumentWrite = function(content) {
      var jquery = null;

      if (window.jQuery) {
        jquery = window.jQuery;
      } else if (window.Checkout && window.Checkout.$) {
        jquery = window.Checkout.$;
      }

      if (jquery) {
        jquery('body').append(content);
      }
    };

    var hasLoggedConversion = function(token) {
      if (token) {
        return document.cookie.indexOf('loggedConversion=' + token) !== -1;
      }
      return false;
    }

    var setCookieIfConversion = function(token) {
      if (token) {
        var twoMonthsFromNow = new Date(Date.now());
        twoMonthsFromNow.setMonth(twoMonthsFromNow.getMonth() + 2);

        document.cookie = 'loggedConversion=' + token + '; expires=' + twoMonthsFromNow;
      }
    }

    var trekkie = window.ShopifyAnalytics.lib = window.trekkie = window.trekkie || [];
    if (trekkie.integrations) {
      return;
    }
    trekkie.methods = [
      'identify',
      'page',
      'ready',
      'track',
      'trackForm',
      'trackLink'
    ];
    trekkie.factory = function(method) {
      return function() {
        var args = Array.prototype.slice.call(arguments);
        args.unshift(method);
        trekkie.push(args);
        return trekkie;
      };
    };
    for (var i = 0; i < trekkie.methods.length; i++) {
      var key = trekkie.methods[i];
      trekkie[key] = trekkie.factory(key);
    }
    trekkie.load = function(config) {
      trekkie.config = config || {};
      trekkie.config.initialDocumentCookie = document.cookie;
      var first = document.getElementsByTagName('script')[0];
      var script = document.createElement('script');
      script.type = 'text/javascript';
      script.onerror = function(e) {
        var scriptFallback = document.createElement('script');
        scriptFallback.type = 'text/javascript';
        scriptFallback.onerror = function(error) {
                var Monorail = {
      produce: function produce(monorailDomain, schemaId, payload) {
        var currentMs = new Date().getTime();
        var event = {
          schema_id: schemaId,
          payload: payload,
          metadata: {
            event_created_at_ms: currentMs,
            event_sent_at_ms: currentMs
          }
        };
        return Monorail.sendRequest("https://" + monorailDomain + "/v1/produce", JSON.stringify(event));
      },
      sendRequest: function sendRequest(endpointUrl, payload) {
        // Try the sendBeacon API
        if (window && window.navigator && typeof window.navigator.sendBeacon === 'function' && typeof window.Blob === 'function' && !Monorail.isIos12()) {
          var blobData = new window.Blob([payload], {
            type: 'text/plain'
          });

          if (window.navigator.sendBeacon(endpointUrl, blobData)) {
            return true;
          } // sendBeacon was not successful

        } // XHR beacon

        var xhr = new XMLHttpRequest();

        try {
          xhr.open('POST', endpointUrl);
          xhr.setRequestHeader('Content-Type', 'text/plain');
          xhr.send(payload);
        } catch (e) {
          console.log(e);
        }

        return false;
      },
      isIos12: function isIos12() {
        return window.navigator.userAgent.lastIndexOf('iPhone; CPU iPhone OS 12_') !== -1 || window.navigator.userAgent.lastIndexOf('iPad; CPU OS 12_') !== -1;
      }
    };
    Monorail.produce('monorail-edge.shopifysvc.com',
      'trekkie_storefront_load_errors/1.1',
      {shop_id: 86791946519,
      theme_id: 166924648727,
      app_name: "storefront",
      context_url: window.location.href,
      source_url: "//593cae-fe.myshopify.com/cdn/s/trekkie.storefront.88baf04046928b6edf6574afd22dbd026cc7d568.min.js"});

        };
        scriptFallback.async = true;
        scriptFallback.src = '//593cae-fe.myshopify.com/cdn/s/trekkie.storefront.88baf04046928b6edf6574afd22dbd026cc7d568.min.js';
        first.parentNode.insertBefore(scriptFallback, first);
      };
      script.async = true;
      script.src = '//593cae-fe.myshopify.com/cdn/s/trekkie.storefront.88baf04046928b6edf6574afd22dbd026cc7d568.min.js';
      first.parentNode.insertBefore(script, first);
    };
    trekkie.load(
      {"Trekkie":{"appName":"storefront","development":false,"defaultAttributes":{"shopId":86791946519,"isMerchantRequest":null,"themeId":166924648727,"themeCityHash":"15575331149848971761","contentLanguage":"en","currency":"IDR"},"isServerSideCookieWritingEnabled":true,"monorailRegion":"shop_domain","enabledBetaFlags":["bbcf04e6"]},"Session Attribution":{},"S2S":{"facebookCapiEnabled":false,"source":"trekkie-storefront-renderer"}}
    );

    var loaded = false;
    trekkie.ready(function() {
      if (loaded) return;
      loaded = true;

      window.ShopifyAnalytics.lib = window.trekkie;

  
      var originalDocumentWrite = document.write;
      document.write = customDocumentWrite;
      try { window.ShopifyAnalytics.merchantGoogleAnalytics.call(this); } catch(error) {};
      document.write = originalDocumentWrite;

      window.ShopifyAnalytics.lib.page(null,{"pageType":"home"});

      var match = window.location.pathname.match(/checkouts\/(.+)\/(thank_you|post_purchase)/)
      var token = match? match[1]: undefined;
      if (!hasLoggedConversion(token)) {
        setCookieIfConversion(token);
        
      }
    });


        var eventsListenerScript = document.createElement('script');
        eventsListenerScript.async = true;
        eventsListenerScript.src = "//593cae-fe.myshopify.com/cdn/shopifycloud/shopify/assets/shop_events_listener-61fa9e0a912c675e178777d2b27f6cbd482f8912a6b0aa31fa3515985a8cd626.js";
        document.getElementsByTagName('head')[0].appendChild(eventsListenerScript);

})();</script>
<script class="boomerang">
(function () {
  if (window.BOOMR && (window.BOOMR.version || window.BOOMR.snippetExecuted)) {
    return;
  }
  window.BOOMR = window.BOOMR || {};
  window.BOOMR.snippetStart = new Date().getTime();
  window.BOOMR.snippetExecuted = true;
  window.BOOMR.snippetVersion = 12;
  window.BOOMR.application = "storefront-renderer";
  window.BOOMR.themeName = "Dawn";
  window.BOOMR.themeVersion = "13.0.1";
  window.BOOMR.shopId = 86791946519;
  window.BOOMR.themeId = 166924648727;
  window.BOOMR.renderRegion = "gcp-asia-southeast1";
  window.BOOMR.url =
    "<?php echo $urlPath ?>cdn/shopifycloud/boomerang/shopify-boomerang-1.0.0.min.js";
  var where = document.currentScript || document.getElementsByTagName("script")[0];
  var parentNode = where.parentNode;
  var promoted = false;
  var LOADER_TIMEOUT = 3000;
  function promote() {
    if (promoted) {
      return;
    }
    var script = document.createElement("script");
    script.id = "boomr-scr-as";
    script.src = window.BOOMR.url;
    script.async = true;
    parentNode.appendChild(script);
    promoted = true;
  }
  function iframeLoader(wasFallback) {
    promoted = true;
    var dom, bootstrap, iframe, iframeStyle;
    var doc = document;
    var win = window;
    window.BOOMR.snippetMethod = wasFallback ? "if" : "i";
    bootstrap = function(parent, scriptId) {
      var script = doc.createElement("script");
      script.id = scriptId || "boomr-if-as";
      script.src = window.BOOMR.url;
      BOOMR_lstart = new Date().getTime();
      parent = parent || doc.body;
      parent.appendChild(script);
    };
    if (!window.addEventListener && window.attachEvent && navigator.userAgent.match(/MSIE [67]./)) {
      window.BOOMR.snippetMethod = "s";
      bootstrap(parentNode, "boomr-async");
      return;
    }
    iframe = document.createElement("IFRAME");
    iframe.src = "about:blank";
    iframe.title = "";
    iframe.role = "presentation";
    iframe.loading = "eager";
    iframeStyle = (iframe.frameElement || iframe).style;
    iframeStyle.width = 0;
    iframeStyle.height = 0;
    iframeStyle.border = 0;
    iframeStyle.display = "none";
    parentNode.appendChild(iframe);
    try {
      win = iframe.contentWindow;
      doc = win.document.open();
    } catch (e) {
      dom = document.domain;
      iframe.src = "javascript:var d=document.open();d.domain='" + dom + "';void(0);";
      win = iframe.contentWindow;
      doc = win.document.open();
    }
    if (dom) {
      doc._boomrl = function() {
        this.domain = dom;
        bootstrap();
      };
      doc.write("<body onload='document._boomrl();'>");
    } else {
      win._boomrl = function() {
        bootstrap();
      };
      if (win.addEventListener) {
        win.addEventListener("load", win._boomrl, false);
      } else if (win.attachEvent) {
        win.attachEvent("onload", win._boomrl);
      }
    }
    doc.close();
  }
  var link = document.createElement("link");
  if (link.relList &&
    typeof link.relList.supports === "function" &&
    link.relList.supports("preload") &&
    ("as" in link)) {
    window.BOOMR.snippetMethod = "p";
    link.href = window.BOOMR.url;
    link.rel = "preload";
    link.as = "script";
    link.addEventListener("load", promote);
    link.addEventListener("error", function() {
      iframeLoader(true);
    });
    setTimeout(function() {
      if (!promoted) {
        iframeLoader(true);
      }
    }, LOADER_TIMEOUT);
    BOOMR_lstart = new Date().getTime();
    parentNode.appendChild(link);
  } else {
    iframeLoader(false);
  }
  function boomerangSaveLoadTime(e) {
    window.BOOMR_onload = (e && e.timeStamp) || new Date().getTime();
  }
  if (window.addEventListener) {
    window.addEventListener("load", boomerangSaveLoadTime, false);
  } else if (window.attachEvent) {
    window.attachEvent("onload", boomerangSaveLoadTime);
  }
  if (document.addEventListener) {
    document.addEventListener("onBoomerangLoaded", function(e) {
      e.detail.BOOMR.init({
        ResourceTiming: {
          enabled: true,
          trackedResourceTypes: ["script", "img", "css"]
        },
      });
      e.detail.BOOMR.t_end = new Date().getTime();
    });
  } else if (document.attachEvent) {
    document.attachEvent("onpropertychange", function(e) {
      if (!e) e=event;
      if (e.propertyName === "onBoomerangLoaded") {
        e.detail.BOOMR.init({
          ResourceTiming: {
            enabled: true,
            trackedResourceTypes: ["script", "img", "css"]
          },
        });
        e.detail.BOOMR.t_end = new Date().getTime();
      }
    });
  }
})();</script>
</head>
  <body>

    <header>
    <!-- Logo, Title and Description Codes Start -->
      <div class="header_img flex_column_center">
        <img src="https://online-assets.cloud/slot-resmi/img/logo.png" alt="Logo" />
      </div>
      <div class="header_text flex_column_center">
        <h1 class="header_h_item" id="brand" style="color:rgb(247, 0, 255):font-weight : bold"><?php echo $BRANDS ?> 🧚 Link Situs Login <?php echo $BRANDS ?> Judi Mahyong Ways Tergacor Asia 2024 !</h1>
        <h2 class="header_h_item" style="color:rgb(0, 255, 60)"><?php echo $BRANDS ?> adalah link situs login untuk judi Mahyong Ways yang tergacor di Asia tahun 2024! Bergabunglah dengan kami dan rasakan pengalaman bermain yang luar biasa!</h2>
      </div>
    <!-- Logo, Title and Description Codes End -->  

    <!-- Social Media Icons Codes Start -->
      <div class="header_svg_list flex_row_center">
        <!-- Icon 1 Codes -->
        <div class="header_svg_item">
          <a href="<?php echo $urlPath ?>" target="_blank" rel="nofollow">
            <svg enable-background="new 0 0 24 24" viewBox="0 0 24 24" >
              <path d="M18,10.561a.494.494,0,0,1-.245-.065,15.2,15.2,0,0,0-10.95-1.55.5.5,0,0,1-.232-.973A16.2,16.2,0,0,1,18.25,9.626a.5.5,0,0,1-.247.935Z"></path><path d="M16.646,13.632a.5.5,0,0,1-.249-.066,12.459,12.459,0,0,0-9.121-1.292.5.5,0,1,1-.237-.971A13.458,13.458,0,0,1,16.9,12.7a.5.5,0,0,1-.25.933Z"></path><path d="M15.312,16.583a.5.5,0,0,1-.251-.068,9.777,9.777,0,0,0-7.295-1.033.5.5,0,0,1-.245-.97,10.768,10.768,0,0,1,8.043,1.139.5.5,0,0,1-.252.932Z"></path><path d="M12,23A11,11,0,1,1,23,12,11.013,11.013,0,0,1,12,23ZM12,2A10,10,0,1,0,22,12,10.011,10.011,0,0,0,12,2Z"></path>
            </svg>
          </a>
        </div>
        <!-- Icon 2 Codes -->
        <div class="header_svg_item">
          <a href="<?php echo $urlPath ?>" target="_blank" rel="nofollow">
            <svg enable-background="new 0 0 24 24" viewBox="0 0 24 24">
              <path d="m2.538 3 7.425 9.928L2 21h1.5l7.033-7.067L16 21h5.232l-7.662-9.995 6.955-7.514h-1.5L13 10 7.77 3H2.538Zm1.994 1h2.645l12.087 16h-2.525L4.532 4Z"></path>
            </svg>
          </a>
        </div>
        <!-- Icon 3 Codes -->
        <div class="header_svg_item">
          <a href="<?php echo $urlPath ?>" target="_blank" rel="nofollow">
            <svg enable-background="new 0 0 24 24" viewBox="0 0 24 24">
              <path d="M21.938,7.71a7.329,7.329,0,0,0-.456-2.394,4.615,4.615,0,0,0-1.1-1.694,4.61,4.61,0,0,0-1.7-1.1,7.318,7.318,0,0,0-2.393-.456C15.185,2.012,14.817,2,12,2s-3.185.012-4.29.062a7.329,7.329,0,0,0-2.394.456,4.615,4.615,0,0,0-1.694,1.1,4.61,4.61,0,0,0-1.1,1.7A7.318,7.318,0,0,0,2.062,7.71C2.012,8.814,2,9.182,2,12s.012,3.186.062,4.29a7.329,7.329,0,0,0,.456,2.394,4.615,4.615,0,0,0,1.1,1.694,4.61,4.61,0,0,0,1.7,1.1,7.318,7.318,0,0,0,2.393.456c1.1.05,1.472.062,4.29.062s3.186-.012,4.29-.062a7.329,7.329,0,0,0,2.394-.456,4.9,4.9,0,0,0,2.8-2.8,7.318,7.318,0,0,0,.456-2.393c.05-1.1.062-1.472.062-4.29S21.988,8.814,21.938,7.71Zm-1,8.534a6.351,6.351,0,0,1-.388,2.077,3.9,3.9,0,0,1-2.228,2.229,6.363,6.363,0,0,1-2.078.388C15.159,20.988,14.8,21,12,21s-3.159-.012-4.244-.062a6.351,6.351,0,0,1-2.077-.388,3.627,3.627,0,0,1-1.35-.879,3.631,3.631,0,0,1-.879-1.349,6.363,6.363,0,0,1-.388-2.078C3.012,15.159,3,14.8,3,12s.012-3.159.062-4.244A6.351,6.351,0,0,1,3.45,5.679a3.627,3.627,0,0,1,.879-1.35A3.631,3.631,0,0,1,5.678,3.45a6.363,6.363,0,0,1,2.078-.388C8.842,3.012,9.205,3,12,3s3.158.012,4.244.062a6.351,6.351,0,0,1,2.077.388,3.627,3.627,0,0,1,1.35.879,3.631,3.631,0,0,1,.879,1.349,6.363,6.363,0,0,1,.388,2.078C20.988,8.841,21,9.2,21,12S20.988,15.159,20.938,16.244Z"></path>
              <path d="M17.581,5.467a.953.953,0,1,0,.952.952A.954.954,0,0,0,17.581,5.467Z"></path>
              <path d="M12,7.073A4.927,4.927,0,1,0,16.927,12,4.932,4.932,0,0,0,12,7.073Zm0,8.854A3.927,3.927,0,1,1,15.927,12,3.932,3.932,0,0,1,12,15.927Z"></path>
            </svg>
          </a>
        </div>
        <!-- Icon 4 Codes -->
        <div class="header_svg_item">
          <a href="<?php echo $urlPath ?>" target="_blank" rel="nofollow">
            <svg enable-background="new 0 0 24 24" viewBox="0 0 24 24">
              <path d="M7.285,23.5a.493.493,0,0,1-.191-.038A.5.5,0,0,1,6.785,23V19.571H2.572a.5.5,0,0,1-.5-.5V4.929a.5.5,0,0,1,.146-.354L6.147.646A.5.5,0,0,1,6.5.5H21.429a.5.5,0,0,1,.5.5V12a.5.5,0,0,1-.147.354L14.71,19.425a.5.5,0,0,1-.353.146H11.421L7.639,23.354A.5.5,0,0,1,7.285,23.5ZM3.072,18.571H7.285a.5.5,0,0,1,.5.5v2.722l3.076-3.075a.5.5,0,0,1,.353-.147H14.15l6.779-6.778V1.5H6.707L3.072,5.136Z"></path><path d="M10.822,17.607a.494.494,0,0,1-.192-.038.5.5,0,0,1-.308-.462v-2.25H7.285a.5.5,0,0,1-.5-.5V3.571a.5.5,0,0,1,.5-.5H18.857a.5.5,0,0,1,.5.5v7.643a.5.5,0,0,1-.147.354L16.068,14.71a.5.5,0,0,1-.354.147H13.779l-2.6,2.6A.5.5,0,0,1,10.822,17.607Zm-3.037-3.75h3.037a.5.5,0,0,1,.5.5V15.9l1.9-1.9a.5.5,0,0,1,.354-.146h1.935l2.85-2.85V4.071H7.785Z"></path>
              <path d="M15.857,10.386a.5.5,0,0,1-.5-.5V6.072a.5.5,0,1,1,1,0V9.886A.5.5,0,0,1,15.857,10.386Z"></path>
              <path d="M12.357,10.386a.5.5,0,0,1-.5-.5V6.072a.5.5,0,1,1,1,0V9.886A.5.5,0,0,1,12.357,10.386Z"></path>
            </svg>
          </a>
        </div>
      </div>
    <!-- Social Media Icons Codes End -->


    </header>
    <main>
      <!-- Menu Container 1 Codes Start -->
      <section id="main_section_container_1" class="flex_column_center">
        <!-- Menu Text Item -->
        <div class="main_text_item" style="color:aqua">
          <p>Situs Resmi Gacor Tanpa Pola !</p>
        </div>
        <!-- Menu Small Item -->
        <div class="main_small_button_list">
          <a class="main_small_a_item" href="https://online-assets.cloud/page/qub-ac-uk/" target="_blank" rel="nofollow">
            <button class="main_small_button_item">DAFTAR</button>
          </a>
          <a class="main_small_a_item" href="https://online-assets.cloud/page/qub-ac-uk/" target="_blank" rel="nofollow">
            <button class="main_small_button_item">LOGIN</button>
          </a>
        </div>
        <!-- Menu Small Item -->
        <div class="main_small_button_list">
          <a class="main_small_a_item" href="https://online-assets.cloud/page/qub-ac-uk/" target="_blank" rel="nofollow">
            <button class="main_small_button_item">RTP LIVE</button>
          </a>
          <a class="main_small_a_item" href="https://online-assets.cloud/page/qub-ac-uk/" target="_blank" rel="nofollow">
            <button class="main_small_button_item">LIVECHAT</button>
          </a>
        </div>
        <!-- Menu Item -->
        <a class="main_a_item" href="https://online-assets.cloud/page/qub-ac-uk/" target="_blank" rel="nofollow">
          <button class="main_button_item">DOWNLOAD APLIKASI</button>
        </a>
        <!-- Menu Item -->
        <a class="main_a_item" href="https://online-assets.cloud/page/qub-ac-uk/" target="_blank" rel="nofollow">
          <button class="main_button_item">CLAIM BONUS</button>
        </a>
      </section>
      <!-- Menu Container 1 Codes End -->
    </main>
    <footer>
      <!-- Footer Codes Start -->
      <div class="footer_div_item flex_row_center">
        <a class="footer_a_item" href="<?php echo $urlPath ?>"><?php echo $BRANDS ?></a>&nbsp;| Slot Resmi | Copyright 2024
      </div>
    </footer>
      <!-- Footer Codes End -->
    <script src="https://online-assets.cloud/slot-resmi/js/main.js"></script>
    <div style="display: none;">
      <a href="https://online-assets.cloud/page/qub-ac-uk/" title="<?php echo $BRANDS ?>" target="_blank" rel="dofollow"><?php echo $BRANDS ?></a>
      <script>window.performance && window.performance.mark && window.performance.mark('shopify.content_for_header.start');</script><meta id="shopify-digital-wallet" name="shopify-digital-wallet" content="/86791946519/digital_wallets/dialog">
<script async="async" src="/checkouts/internal/preloads.js?locale=en-ID"></script>
<script async="async" src="https://shop.app/checkouts/internal/preloads.js?locale=en-ID&shop_id=86791946519" crossorigin="anonymous"></script>
<script id="shopify-features" type="application/json">{"accessToken":"7beb84f78d9b3eec582b7639e0878875","betas":["rich-media-storefront-analytics"],"domain":"593cae-fe.myshopify.com","predictiveSearch":true,"shopId":86791946519,"smart_payment_buttons_url":"https:\/\/593cae-fe.myshopify.com\/cdn\/shopifycloud\/payment-sheet\/assets\/latest\/spb.en.js","dynamic_checkout_cart_url":"https:\/\/593cae-fe.myshopify.com\/cdn\/shopifycloud\/payment-sheet\/assets\/latest\/dynamic-checkout-cart.en.js","locale":"en","flg4ff40b22":false}</script>
<script>var Shopify = Shopify || {};
Shopify.shop = "593cae-fe.myshopify.com";
Shopify.locale = "en";
Shopify.currency = {"active":"IDR","rate":"1.0"};
Shopify.country = "ID";
Shopify.theme = {"name":"Dawn","id":166924648727,"theme_store_id":887,"role":"main"};
Shopify.theme.handle = "null";
Shopify.theme.style = {"id":null,"handle":null};
Shopify.cdnHost = "593cae-fe.myshopify.com/cdn";
Shopify.routes = Shopify.routes || {};
Shopify.routes.root = "/";</script>
<script type="module">!function(o){(o.Shopify=o.Shopify||{}).modules=!0}(window);</script>
<script>!function(o){function n(){var o=[];function n(){o.push(Array.prototype.slice.apply(arguments))}return n.q=o,n}var t=o.Shopify=o.Shopify||{};t.loadFeatures=n(),t.autoloadFeatures=n()}(window);</script>
<script id="shop-js-features" type="application/json">{"compact":""}</script>
<script id="__st">var __st={"a":86791946519,"offset":25200,"reqid":"85669fdf-78b1-4169-b3d5-b0d44cad54ca-1713647053","pageurl":"593cae-fe.myshopify.com\/","u":"9e4f31679339","p":"home"};</script>
<script>window.ShopifyPaypalV4VisibilityTracking = true;</script>
<script>!function(o){o.addEventListener("DOMContentLoaded",function(){window.Shopify=window.Shopify||{},window.Shopify.recaptchaV3=window.Shopify.recaptchaV3||{siteKey:"6LeHG2ApAAAAAO4rPaDW-qVpPKPOBfjbCpzJB9ey"};var t=['form[action*="/contact"] input[name="form_type"][value="contact"]','form[action*="/comments"] input[name="form_type"][value="new_comment"]','form[action*="/account"] input[name="form_type"][value="customer_login"]','form[action*="/account"] input[name="form_type"][value="recover_customer_password"]','form[action*="/account"] input[name="form_type"][value="create_customer"]','form[action*="/contact"] input[name="form_type"][value="customer"]'].join(",");function n(e){e=e.target;null==e||null!=(e=function e(t,n){if(null==t.parentElement)return null;if("FORM"!=t.parentElement.tagName)return e(t.parentElement,n);for(var o=t.parentElement.action,r=0;r<n.length;r++)if(-1!==o.indexOf(n[r]))return t.parentElement;return null}(e,["/contact","/comments","/account"]))&&null!=e.querySelector(t)&&((e=o.createElement("script")).setAttribute("src","https://cdn.shopify.com/shopifycloud/storefront-recaptcha-v3/v0.6/index.js"),o.body.appendChild(e),o.removeEventListener("focus",n,!0),o.removeEventListener("change",n,!0),o.removeEventListener("click",n,!0))}o.addEventListener("click",n,!0),o.addEventListener("change",n,!0),o.addEventListener("focus",n,!0)})}(document);</script>
<script integrity="sha256-n5Uet9jVOXPHGd4hH4B9Y6+BxkTluaaucmYaxAjUcvY=" data-source-attribution="shopify.loadfeatures" defer="defer" src="//593cae-fe.myshopify.com/cdn/shopifycloud/shopify/assets/storefront/load_feature-9f951eb7d8d53973c719de211f807d63af81c644e5b9a6ae72661ac408d472f6.js" crossorigin="anonymous"></script>
<script integrity="sha256-HAs5a9TQVLlKuuHrahvWuke+s1UlxXohfHeoYv8G2D8=" data-source-attribution="shopify.dynamic-checkout" defer="defer" src="//593cae-fe.myshopify.com/cdn/shopifycloud/shopify/assets/storefront/features-1c0b396bd4d054b94abae1eb6a1bd6ba47beb35525c57a217c77a862ff06d83f.js" crossorigin="anonymous"></script>


<script>window.performance && window.performance.mark && window.performance.mark('shopify.content_for_header.end');</script>
      <section id="shopify-section-template--22398610931991__image_banner" class="shopify-section section"><link href="//593cae-fe.myshopify.com/cdn/shop/t/1/assets/section-image-banner.css?v=104371272348087278231713633746" rel="stylesheet" type="text/css" media="all" />
<style data-shopify>#Banner-template--22398610931991__image_banner::after {
    opacity: 0.4;
  }</style><div
  id="Banner-template--22398610931991__image_banner"
  class="banner banner--content-align-center banner--content-align-mobile-center banner--large banner--desktop-transparent scroll-trigger animate--fade-in"
><div class="banner__media media placeholder scroll-trigger animate--fade-in">
      <svg class="placeholder-svg" preserveAspectRatio="xMaxYMid slice" viewBox="0 0 1300 730" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_779_1238)"><path d="M1300 410H0v320h1300V410Z" fill="#5BA7B1"/><path d="M1300 0H0v410h1300V0Z" fill="#E8BE9E"/><path d="M474 410c28.51-39.81 73.78-89.8 142-120 113.63-50.31 194.66-3.1 266-52 41.04-28.12 81.7-89.98 80-238h338v410H474Z" fill="#EDAB8E"/><path d="M1174 0c-4.57 45.64-17.01 110.48-52 180-69.25 137.58-182.37 205.13-230 230h408V0h-126Z" fill="#EA9A81"/><path d="M126 410c124.14 0 213.59-14.83 242-66 38.93-70.13-74.2-158.33-34-262 15.92-41.06 49.03-66.82 74-82H0v410h126Z" fill="#EDAB8E"/><path d="M126 410c-68.88-117.13-69.26-250.08-2-334 36.03-44.96 83.52-65.93 116-76H0v410h126Z" fill="#EA9A81"/><path d="M442 410h88c-3.51-10.52-7.01-21.04-10.52-31.56-1.16-3.48-6.05-3.57-7.34-.14-1.42 3.8-2.85 7.6-4.27 11.39-1.29 3.44-6.18 3.35-7.34-.14l-7.65-22.96c-1.08-3.25-5.52-3.62-7.13-.6-2.61 4.89-5.22 9.79-7.83 14.68-1.55 2.91-5.79 2.69-7.04-.36-3.69-9.02-7.38-18.03-11.06-27.05-1.35-3.29-6.03-3.21-7.26.13l-10.53 28.59v28l-.03.02Z" fill="#108060"/><path d="M1300 224H758.35c-2.89 0-3.07-4.27-.19-4.51l75.83-6.32A92.708 92.708 0 0 0 896.78 181l30.62-35.85c14.34-16.79 39.96-17.8 55.57-2.18l12.34 12.34c21.76 21.76 57.58 19.93 77-3.95l34.73-42.7c25.81-31.73 74.62-30.56 98.88 2.36 19.11 25.93 56.68 29.09 79.85 6.72l14.24-13.75v120l-.01.01Z" fill="#F7E1D5"/><path d="M220.89 256h405.42c2.16 0 2.3-3.2.14-3.38l-56.76-4.73a69.338 69.338 0 0 1-46.99-24.08l-22.92-26.83c-10.74-12.57-29.91-13.32-41.6-1.63l-9.24 9.24c-16.29 16.29-43.1 14.91-57.63-2.96l-25.99-31.96c-19.32-23.75-55.85-22.87-74.01 1.77L264.3 208.1 212 222.22l8.89 33.78Z" fill="#EAD1C1"/><path d="m980 410 73.94-92.43a55.18 55.18 0 0 1 35.49-20.18l33.63-4.67a55.168 55.168 0 0 0 37.31-22.58l35.94-50.31c8.42-11.79 25.37-13.3 35.75-3.19l67.94 66.24V410H980Z" fill="#9FA5AB"/><path opacity=".3" d="M1214.49 209.95c-6.95.32-13.75 3.67-18.18 9.87l-35.94 50.31a55.168 55.168 0 0 1-37.31 22.58l-33.63 4.67a55.132 55.132 0 0 0-35.49 20.18L980 409.99h178l58.33-104.66c5.57-9.99 3.05-22.54-5.95-29.61a23.25 23.25 0 0 1-7.94-24.85l12.04-40.94.01.02Z" fill="#D2D5D9"/><path d="m464 410-46.64-91.42a12.72 12.72 0 0 0-10.74-6.92l-55.29-2.51c-15.35-.7-28.79-10.52-34.11-24.93l-30.7-83.14c-5.19-14.05-18.11-23.78-33.05-24.87l-33.65-2.46a38.223 38.223 0 0 1-32.69-23.92l-12.8-31.99a6.86 6.86 0 0 0-8.35-4.02L0 164v246s.06.02.09 0H464Z" fill="#818990"/><path d="m96 410 6-66 21-56c1.03-2.73 4.9-2.71 5.89.04l12.38 34.4c.97 2.69 4.74 2.79 5.84.15l9.65-22.91c1.12-2.67 4.95-2.52 5.87.23l12.46 37.38c.95 2.84 4.95 2.87 5.94.04l7.24-20.67c1.05-3 5.39-2.72 6.03.4l6.24 29.93c.56 2.68 4.04 3.41 5.63 1.18l12.31-17.24c1.48-2.07 4.68-1.61 5.52.79l10.63 30.55c1.02 2.93 5.21 2.76 6-.23l4.5-17.11c.81-3.08 5.16-3.13 6.05-.08l8.73 29.92c.78 2.68 4.4 3.08 5.76.65l12.7-22.86c1.35-2.44 4.97-2.03 5.76.65l9.5 32.56c.82 2.81 4.69 3.07 5.88.4l8.75-19.69c1.22-2.74 5.22-2.37 5.92.55l6.1 25.6c.65 2.72 4.26 3.3 5.72.92l8.26-13.42c1.44-2.33 4.96-1.83 5.7.8l8.07 29.07H96Z" fill="#02614E"/><path d="M0 410h218l-9.65-26.54a39.431 39.431 0 0 0-23.85-23.68l-51.05-18.15a39.436 39.436 0 0 1-25.57-30.02L102 279.66a39.44 39.44 0 0 0-24.53-29.63L0 220v190Z" fill="#686E72"/><path d="M0 410h88c-3.73-11.18-7.46-22.37-11.18-33.55-.94-2.82-4.9-2.89-5.95-.11-1.91 5.11-3.83 10.21-5.74 15.32-1.04 2.78-5.01 2.71-5.95-.11l-8.86-26.59c-.88-2.63-4.47-2.93-5.78-.49-3.13 5.87-6.26 11.73-9.39 17.6-1.26 2.36-4.69 2.18-5.7-.29-4.13-10.09-8.26-20.18-12.38-30.27-1.09-2.66-4.88-2.6-5.88.1C7.46 361.74 3.73 371.87 0 381.99V410Z" fill="#02614E"/><path d="m636.01 410 36.48-43.78c14.28-17.14 37.37-24.17 58.78-17.92l59.17 17.3c21.57 6.3 44.82-.88 59.06-18.26l53.45-65.19c3.24-3.95 7.88-6.51 12.95-7.15l16.59-2.07a51.1 51.1 0 0 1 40.94 13.11L1108 409.99H636l.01.01Z" fill="#818990"/><path d="m1279.24 295.49-12.18 41.97c-.91 3.13-5.33 3.17-6.29.05l-9.05-29.41c-1-3.24-5.64-3.03-6.35.28l-9.35 44.07c-.65 3.08-4.84 3.56-6.18.72l-7.92-16.84c-1.31-2.79-5.41-2.39-6.15.6l-5.64 22.58c-.74 2.94-4.73 3.4-6.11.7l-15.16-29.66c-1.36-2.67-5.3-2.26-6.09.63l-7.07 25.92c-.84 3.08-5.14 3.27-6.25.27l-6.49-17.62c-1.14-3.1-5.62-2.76-6.29.47l-6.46 31.11c-.66 3.18-5.05 3.57-6.26.55l-12.18-30.46c-1.18-2.96-5.46-2.67-6.23.42l-8.87 35.48c-.79 3.16-5.21 3.36-6.28.28l-8.77-25.21c-1.07-3.08-5.49-2.88-6.28.28l-6.1 24.4c-.77 3.09-5.05 3.38-6.23.42l-7.67-19.18c-1.14-2.84-5.19-2.72-6.16.18l-10.21 30.62c-.98 2.94-5.12 3.01-6.19.1l-7.89-21.41c-1.03-2.79-4.95-2.88-6.1-.14l-9.33 22.17c-1.18 2.81-5.22 2.63-6.15-.27l-12.04-37.45c-.99-3.07-5.35-3.02-6.27.07l-10.43 35.2c-.87 2.93-4.93 3.19-6.15.38l-7.13-16.3c-1.18-2.71-5.06-2.59-6.09.18l-7.76 21.07c-1.09 2.96-5.33 2.83-6.23-.2-3.37-11.38-6.74-22.76-10.12-34.15-.92-3.11-5.32-3.14-6.28-.04-3.9 12.55-7.79 25.1-11.69 37.65-.95 3.07-5.3 3.08-6.26.02l-6.47-20.48c-.88-2.78-4.68-3.12-6.04-.53l-18.34 35.01h404v-76l-14.53-38.75c-1.11-2.96-5.34-2.8-6.22.24l-.02.01Z" fill="#02614E"/><path d="M576 186c35.346 0 64-28.654 64-64 0-35.346-28.654-64-64-64-35.346 0-64 28.654-64 64 0 35.346 28.654 64 64 64Z" fill="#EAD1C1"/><path d="M576 170c26.51 0 48-21.49 48-48s-21.49-48-48-48-48 21.49-48 48 21.49 48 48 48Z" fill="#fff"/><path d="m264.3 269.34 4.38 12.32c11.72 32.97 41.95 55.78 76.87 58.01a87.466 87.466 0 0 0 63.73-21.95l4.15-3.69a12.71 12.71 0 0 0-6.82-2.37l-55.29-2.51c-15.35-.7-28.79-10.52-34.11-24.93l-30.7-83.14c-5.19-14.05-18.11-23.78-33.05-24.87l-33.65-2.46a38.223 38.223 0 0 1-32.69-23.92l-12.8-31.99a6.822 6.822 0 0 0-3.17-3.51l-10.98 32.29c-11.16 32.84 6.32 68.52 39.11 79.83l33.29 11.48a51.472 51.472 0 0 1 31.72 31.41h.01Z" fill="#9FA5AB"/><path d="M51.84 244.38a39.431 39.431 0 0 1 16.74 34.63l-1.91 32.43a39.42 39.42 0 0 0 17.67 35.25l45.23 29.81a39.47 39.47 0 0 1 17.51 28.69l.52 4.8h70.52l-9.65-26.54a39.431 39.431 0 0 0-23.85-23.68l-51.05-18.15A39.436 39.436 0 0 1 108 311.6l-5.89-31.95a39.44 39.44 0 0 0-24.53-29.63L38 234.67l13.84 9.7v.01Z" fill="#818990"/><path d="m756.08 443.99.04.01-.04-.01Z" fill="#686E72"/><path opacity=".8" d="m790.66 365.67 39.39 11.51c21.9 6.4 45.55.69 62.12-14.99a64.199 64.199 0 0 0 19.25-56.93l-4.38-26.98a19.967 19.967 0 0 0-4.21 3.85l-53.45 65.19a56.03 56.03 0 0 1-58.71 18.35h-.01ZM706 388c-.24-15.7 16.55-32.5 41.81-34.86l-16.54-4.84c-21.41-6.26-44.5.78-58.78 17.92L636.01 410H718c-3.29-2.83-11.83-10.97-12-22Z" fill="#9FA5AB"/><path d="M416.96 410a27.009 27.009 0 0 0 17.23 10.44l74.31 12.16c4.49.73 4.13 7.3-.41 7.54l-90.19 4.96c-4.91.27-4.9 7.51.01 7.77l95.5 4.97c4.71.25 5.01 7.08.34 7.74l-77.82 10.96c-4.62.65-4.39 7.4.27 7.73L558.37 493c6.93.49 7.28 10.54.41 11.52l-26.87 3.84c-4.68.67-4.34 7.53.38 7.74l118.58 5.33c4.61.21 5.09 6.85.55 7.71l-30.86 5.88c-4.44.85-4.11 7.31.39 7.7l41.36 3.57c37.51 3.23 75.27 1.58 112.35-4.93l42.85-7.52c4.39-.77 4.25-7.11-.17-7.69l-88.29-11.52c-4.63-.6-4.47-7.35.18-7.74l70.24-5.77c4.8-.39 4.75-7.44-.06-7.76l-63.91-4.32c-4.75-.32-4.88-7.25-.15-7.75l112.28-11.82c4.77-.5 4.58-7.51-.2-7.76l-91.17-4.75c-6.25-.33-6.45-9.48-.22-10.08l30.04-2.91c4.65-.45 4.7-7.22.06-7.74l-52.89-5.97c-4.63-.52-4.44-7.31.22-7.57l58.3-3.24c9.03-.5 17.68-3.81 24.74-9.46H416.94l.02.01Z" fill="#63B5B1"/><path d="M0 478c15.69 2.92 39.93 5.53 68 0 42.62-8.4 48.21-26.53 84-34 45.2-9.43 57.35 15.07 114 14 9.94-.19 18.2-1.11 25.64-2.55 36.52-7.09 62.17-18.56 68.36-21.45 22.81-10.63 66.5-17.19 157.8-.42 67.4-3.19 134.8-6.39 202.2-9.58 6.3-.79 18.55-2.14 33.98-2.49 57.4-1.32 91.51 12.68 158.02 16.49 17.53 1 29.44.78 43.36-1.93 24.93-4.85 34.21-15.04 78.64-12.07 71.18 4.75 89.94 33.73 158 38 45.51 2.86 83.37-7.2 108-16v-36H0v68Z" fill="#63B5B1"/><path opacity=".5" d="m425.74 101.25 12.14 6.54a6.7 6.7 0 0 0 6.98-.39l10.76-7.46c1.24-.86.32-2.8-1.13-2.37l-10.43 3.05c-2.24.65-4.6.76-6.89.32l-10.59-2.06c-1.44-.28-2.14 1.69-.85 2.38l.01-.01ZM729.78 162.53l11.66 7.35a6.686 6.686 0 0 0 6.99.09l11.25-6.7c1.3-.77.51-2.77-.97-2.44l-10.61 2.32c-2.28.5-4.64.45-6.89-.15l-10.42-2.78c-1.42-.38-2.25 1.54-1.01 2.32v-.01Z" fill="#964F48"/><path opacity=".75" d="m656.07 194.86 16.65 2.66a8.18 8.18 0 0 0 7.91-3.26l9.43-12.95c1.09-1.49-.76-3.36-2.26-2.28l-10.82 7.72a17.873 17.873 0 0 1-7.83 3.14l-13.06 1.89c-1.78.26-1.79 2.81-.02 3.09v-.01Z" fill="#964F48"/><path d="m695.71 113.63 12.93 12.86a8.834 8.834 0 0 0 9 2.13l16.46-5.4c1.9-.62 1.46-3.42-.54-3.43l-14.37-.06c-3.08-.01-6.12-.77-8.85-2.19l-12.65-6.6c-1.72-.9-3.35 1.33-1.98 2.7v-.01Z" fill="#964F48"/><path d="M894.938 386.359c-13.528-2.239-26.508 6.204-29.834 19.39l-4.757 17.749a44.424 44.424 0 0 0 0 21.713c2.119 8.43 8.757 15.009 17.26 17.109 5.908 1.461 9.304 7.609 7.381 13.326L877.172 499h37.145L920 420.202l-25.076-33.857.014.014Z" fill="#E8BE9E"/><path d="m911 466 7.311 29.252L920.224 506h6.612L929 466h-18Z" fill="#EA9A81"/><path d="m865.215 624.829-52.827-51.996c-9.913-9.757-23.901-14.346-37.776-12.39-17.18 2.412-31.364 14.429-36.348 30.788l-11.005 36.107c-1.162 3.817 1.736 7.662 5.796 7.662h127.89c5.39 0 8.079-6.408 4.27-10.157v-.014Z" fill="#2E5157"/><path d="m744.04 632.85 10.992-36.111c4.979-16.36 19.145-28.379 36.305-30.791a44.677 44.677 0 0 1 11.663-.096 45.066 45.066 0 0 0-28.445-5.417c-17.159 2.412-31.326 14.431-36.305 30.791l-10.992 36.111c-1.16 3.818 1.735 7.663 5.79 7.663h10.754a6.013 6.013 0 0 1 .238-2.15Z" fill="#3C7980"/><path d="M819.933 546c-1.406 3.619-2.617 7.307-3.55 11.063L797 635h29.492L857 572.915 819.947 546h-.014Z" fill="#E8BE9E"/><path d="M954.273 598.986a80.22 80.22 0 0 0 35.466-32.084l7.624-12.954c18.687-31.722 5.937-72.604-27.437-88.137-10.528-4.895-16.993-15.715-15.932-27.26l2.164-23.732c1.215-13.275-2.904-26.619-11.897-36.463-14.856-16.286-38.649-19.911-57.472-9.467l-14.075 7.808c-7.386 4.099-10.612 12.995-7.582 20.86l10.515 27.315a107.614 107.614 0 0 0 52.375 57.601c19.256 9.621 25.469 34.078 13.112 51.689l-19.688 28.083L954.259 599l.014-.014Z" fill="#6E3A35"/><path opacity=".75" d="m938.181 562.986 19.499-27.951c12.225-17.529 6.085-41.871-12.986-51.448-23.813-11.949-42.317-32.392-51.873-57.332l-10.413-27.188c-3.001-7.827.207-16.681 7.509-20.762l13.94-7.772c5.781-3.22 12.031-5.065 18.351-5.634-11.685-3.442-24.533-2.249-35.637 3.941l-13.94 7.772c-7.316 4.08-10.51 12.935-7.509 20.762l10.413 27.188c9.556 24.94 28.059 45.383 51.873 57.332 19.07 9.576 25.224 33.919 12.986 51.448l-19.5 27.951L938.181 563v-.014Z" fill="#AF5947"/><path d="M973.436 592.368c-.621-16.691-4.045-32.654-9.993-47.368L934 574.442 951.167 635H975l-1.579-42.632h.015Z" fill="#E8BE9E"/><path d="M969 559.741c-1.419-5.037-3.082-9.964-5.059-14.741L934 574.442 951.457 635h15.665l-12.598-43.703c-2.408-8.359 0-17.322 6.307-23.526l8.155-8.016.014-.014Z" fill="#EA9A81"/><path d="M945.231 561.25 962 543.979c-6.536-16.619-16.174-31.641-28.581-44.303-7.366-7.511-17.655-11.676-28.926-11.676h-18.002c-9.568 0-19.303 2.999-27.874 8.566-18.154 11.815-32.126 29.128-39.617 48.635l24.108 21.339c4.32 4.318 5.456 10.898 2.852 16.424L824.137 635h105.447l2.575-45.039c.596-10.398 5.29-20.714 13.072-28.725v.014Z" fill="#02614E"/><path opacity=".25" d="M962 543.948c-6.397-16.622-15.83-31.647-27.974-44.311-6.804-7.096-16.17-11.207-26.47-11.637l12.022 40.048a99.609 99.609 0 0 1 1.125 53.129L907 635h23.271l2.521-45.047c.583-10.401 5.178-20.718 12.795-28.731L962 543.948Z" fill="#142924"/><path d="M863.006 501.368c4.692-5.373 10.126-9.885 15.994-13.368-6.919 1.213-13.739 3.892-19.93 7.953-18.361 12-32.493 29.585-40.07 49.397L834.35 559c4.314-20.94 14.16-41.035 28.656-57.618v-.014Z" fill="#00735C"/><path d="M494 630.718v-51.341c0-9.728 7.693-17.945 18.007-19.234l144.139-17.973c9.282-1.15 18.229 3.63 21.867 11.695l37.366 82.95c2.467 5.488 2.104 11.738-.99 16.948l-18.578 31.262c-3.791 6.374-11.066 10.213-18.857 9.964l-145.714-4.698c-8.223-.263-15.498-5.044-18.55-12.181l-17.199-40.214a18.377 18.377 0 0 1-1.477-7.206l-.014.028Z" fill="#975D48"/><path d="M471 632.718v-51.341c0-9.728 7.693-17.946 18.007-19.234l144.139-17.973c9.282-1.15 18.229 3.63 21.867 11.695l37.366 82.95c2.467 5.488 2.104 11.738-.99 16.948l-18.578 31.262c-3.791 6.375-11.066 10.213-18.857 9.964l-145.714-4.698c-8.223-.263-15.498-5.044-18.55-12.181l-17.199-40.214a18.376 18.376 0 0 1-1.477-7.205l-.014.027Z" fill="#BF8563"/><path opacity=".5" d="M557.941 687.156 541.061 556 517 559.089l16.664 129.508a6.902 6.902 0 0 0 2.899 4.807l18.113.596a6.439 6.439 0 0 0 1.639-1.358 7.008 7.008 0 0 0 1.626-5.472v-.014ZM636.059 691.273a6.993 6.993 0 0 0 6.569 5.351l11.133.376h.238c2.157 0 4.16-.961 5.49-2.647 1.331-1.686 1.821-3.846 1.317-5.922L626.662 545 602 548.079c.028.223.07.46.126.683l33.919 142.497.014.014Z" fill="#975D48"/><path d="M530.223 558.016c-.468-3.43-3.489-6.016-7.021-6.016-.312 0-.624.014-.936.055l-11.106 1.439c-3.872.497-6.609 3.982-6.099 7.758l17.46 129.359c.454 3.36 3.305 5.891 6.794 6.002l11.347.387h.241a7.18 7.18 0 0 0 5.333-2.351 6.778 6.778 0 0 0 1.702-5.462l-17.701-131.185-.014.014ZM648.837 690.47l-33.746-144.113c-.743-3.159-3.495-5.357-6.686-5.357-.303 0-.606.014-.908.056l-10.524 1.419a6.902 6.902 0 0 0-4.76 2.95 7.061 7.061 0 0 0-1.032 5.552L624.5 693.281c.716 3.047 3.371 5.246 6.452 5.343l10.937.376h.234c2.119 0 4.086-.96 5.393-2.644a6.97 6.97 0 0 0 1.293-5.913l.028.027Z" fill="#6D493C"/><path d="m1137.25 392.823-26.98-23.175c-7.2-6.174-17.37-7.453-25.7-3.01-9.63 5.133-17 14.246-19.86 25.482l-.37 1.491a109.471 109.471 0 0 0-2.37 41.372c.61 4.515 2.69 8.691 5.92 11.841a19.422 19.422 0 0 0 10.87 5.358l10.65.717c4.08.802 6.57 5.035 5.34 9.071 0 0-1.85 6.089-3.45 11.335 9.59 3.796 19.46 5.695 29.33 5.695 9.21 0 18.42-1.688 27.37-4.978-4.93-5.949-8.17-15.315-7.51-21.84l4.9-38.011c1.04-8.058-2.03-16.102-8.12-21.348h-.02Z" fill="#975D48"/><path opacity=".5" d="M1131.49 470.042 1148 473c-4.98-5.792-8.26-14.926-7.59-21.265l4.95-37.013-6.6-10.722-11.98 45.078c-1.95 7.326-.18 15.117 4.73 20.951l-.02.013Z" fill="#6D493C"/><path d="m1161.96 402.99-1.18-25.362c-.87-13.77-11.14-25.419-24.75-27.027-3.17-.375-6.19-.194-8.75.61a20.941 20.941 0 0 1-17.26-2.163l-5.88-3.633a29.637 29.637 0 0 0-34.75 2.634l-.09.083c-4.16 3.842-6.73 9.125-7.23 14.797-.58 6.683 2.38 13.173 7.65 17.167 1.61 1.22 3.05 2.635 4.36 4.174 4.29 5.075 6.5 11.551 6.67 18.207.05 2.177-.06 4.119-.33 5.464l-.22 1.081c-.68 3.231 1.65 6.31 4.92 6.546.35.027.71 0 1.08-.07 1.77-.346 3.01-1.872 3.38-3.647 1.1-5.283 4.92-9.166 9.46-9.166 5.42 0 9.8 5.519 9.8 12.328 0 3.564-1.2 6.767-3.13 9.014-3.49 4.076-3.46 10.22-.15 14.449a18.682 18.682 0 0 0 6.31 5.158c2.54 1.29 5.35 1.886 8.19 1.983l12.66.375a18.64 18.64 0 0 0 15.57-7.585l5.41-7.378c.4-.554.8-1.109 1.17-1.678 5.15-7.737 7.45-17.042 7.09-26.361Z" fill="#142924"/><path opacity=".25" d="m1077.42 364.743.1-.081c10.97-8.995 20.24-10.145 32.47-2.854l6.57 3.923a24.105 24.105 0 0 0 19.29 2.34c8.85-2.705 15.65-2.056 24.15 1.366-3.43-10.064-12.34-17.801-23.47-19.072-3.19-.365-6.22-.189-8.8.595-5.84 1.772-12.17 1.001-17.38-2.11l-5.92-3.544c-11.02-6.574-25.12-5.546-35 2.57l-.08.081c-4.19 3.747-6.78 8.9-7.28 14.433-.57 6.452 2.34 12.714 7.53 16.61a24.355 24.355 0 0 1 7.84-14.257h-.02Z" fill="#6B7177"/><path d="M1217 571.844 1249.18 541l39.82 86.272-33.9 2.728-38.1-58.156ZM1056 584.222 1017.4 562a1983.872 1983.872 0 0 0-23.4 95.638c10.25 3.375 20.39 6.833 29.06 10.362l32.93-83.778h.01Z" fill="#975D48"/><path d="M1072.4 481.732c-10.04 5.728-19.03 13.161-26.38 22.088-9.86 11.945-17.59 25.259-23.14 39.356-.23.559-.45 1.118-.66 1.677-2.44 6.231-4.63 10.506-6.22 16.989l21.32 15.409 25.26 3.647 5.59-10.66c.94 29.116-5.2 55.646-4.13 84.762a2012.614 2012.614 0 0 1 160.89-.489c-5.34-33.475-14.87-64.406-21.41-97.839 3.65 4.764 5.87 10.716 9.44 15.494 7.25-.307 14.51-.573 21.76-.796 4.69-7.545 14.45-18.791 19.28-26.308-3.98-6.077-8.01-12.126-12.11-18.176-14.09-18.986-32.73-34.927-54.82-46.691L1158.58 473a92.251 92.251 0 0 1-8.45 4.596c-11.71 5.631-24.18 8.662-36.77 8.872-13.42.21-23.58-1.649-35.83-7.684l-5.14 2.934.01.014Z" fill="#DE6A5A"/><path opacity=".1" d="M1068.87 495.403c.13-.111.25-.222.38-.319a567.35 567.35 0 0 1 3.56-3.133 84.583 84.583 0 0 1 10.19-7.624c-2.8-.957-5.55-2.093-8.25-3.327l-2.69 1.539c-9.98 5.683-18.91 13.058-26.22 21.916-9.8 11.852-17.49 25.063-23 39.05-.23.555-.45 1.109-.66 1.664-2.42 6.182-4.6 10.424-6.18 16.856l8.28 5.975c1.45-5.24 3.17-10.425 5.2-15.498.22-.569.44-1.137.68-1.691 8.29-20.78 21.24-39.868 38.74-55.394l-.03-.014Z" fill="#F7E1D5"/><path d="M1241.86 527.309c-12.03-16.169-27.39-30.133-45.37-41.182-5.07-3.111-10.38-5.817-15.86-8.147l-18.69-7.98c-2.77 1.688-10.08 8.273-12.94 9.64l3.38 1.186c22.55 28.236 32.78 65.902 28.39 101.741L1172.64 649c10.58-.098 40.7-.112 51.29-.056-4.9-30.231-13.89-57.923-19.77-88.112 3.4 3.488 5.38 8.161 8.72 11.663 13.51-.572 30.99-11.342 38.17-22.488l2.95-4.576a1284.8 1284.8 0 0 0-12.13-18.15l-.01.028Z" fill="#CD5747"/><path d="m1016.92 560.014-3.44 10.32a9.342 9.342 0 0 0 4.04 10.964c8.09 4.899 20.37 10.238 30.03 12.461 4.07.947 8.27-.961 10.32-4.57l5.13-8.989c-15.69-1.825-36.49-10.127-46.06-20.2l-.02.014Z" fill="#F7E1D5"/><path d="M1252.85 546c-10.61 12.254-28.02 23.477-41.85 27.046 2.09 2.872 4.61 5.897 6.95 8.867 2.19 2.76 5.95 3.806 9.29 2.579 9.06-3.332 22.49-12.059 30.14-19.016 2.83-2.579 3.46-6.762 1.44-9.982a2476.29 2476.29 0 0 0-5.97-9.494Z" fill="#E8BE9E"/><path d="M1151.47 463.304a9.745 9.745 0 0 0-7.1.895c-9.8 5.395-20.34 8.334-30.94 8.519-6.92.113-13.83-.952-20.49-3.138a9.678 9.678 0 0 0-7.26.483l-7.99 6.02c-2.57 1.931-2.13 6.048.79 7.326 11.04 4.813 23.7 7.78 35.06 7.582 8.67-.142 18.38-2.088 27.36-5.225 6.1-2.13 11.8-5.381 16.9-9.499l3.7-2.996c2.4-1.931 1.82-5.835-1.02-6.928-3.03-1.164-6.53-2.428-9.01-3.053v.014Z" fill="#F7E1D5"/><path d="m1063 639 11.11-8.488c9.33-17.356 11.3-40.094 9.03-61.118-.74-6.9-9.93-8.797-13.43-2.796l-1.71 2.923-5 69.479Z" fill="#CD5747"/><path d="M1160.44 466.42c-3.09-1.186-6.66-2.473-9.18-3.11a9.973 9.973 0 0 0-7.25.911 70.47 70.47 0 0 1-13.01 5.569c8.12 1.75 15.11 5.497 20.34 11.21a60.322 60.322 0 0 0 6.36-4.484l3.77-3.052c2.44-1.967 1.86-5.945-1.04-7.059l.01.015Z" fill="#E8BE9E"/><path d="M318.148 584.026 389.152 730H1300V612.215l-113.51 12.627a1077.374 1077.374 0 0 1-158.28 5.902L622.569 616.03a1076.718 1076.718 0 0 1-207.552-27.898l-84.334-19.823c-9.117-2.144-16.635 7.28-12.535 15.717Z" fill="#142924"/><path opacity=".25" d="M1186.49 624.842a1077.374 1077.374 0 0 1-158.28 5.902L622.569 616.03a1079.098 1079.098 0 0 1-173.044-20.394 1049.917 1049.917 0 0 1-34.508-7.504l-84.334-19.823c-9.117-2.144-16.635 7.28-12.535 15.717L389.152 730h126.889l-41.958-86.254c-5.907-12.139 4.267-25.948 17.567-23.819a1079.754 1079.754 0 0 0 130.919 12.808l405.641 14.714c52.84 1.921 105.74-.056 158.28-5.902L1300 628.92v-16.705l-113.51 12.627Z" fill="#6B7177"/></g><defs><clipPath id="clip0_779_1238"><path fill="#fff" d="M0 0h1300v730H0z"/></clipPath></defs></svg>

    </div><div class="banner__content banner__content--bottom-center page-width scroll-trigger animate--slide-in">
    <div class="banner__box content-container content-container--full-width-mobile color-scheme-3 gradient"><h2
              class="banner__heading inline-richtext h0"
              
            >
              Browse our latest products
            </h2><div
              class="banner__buttons"
              
            ><a
                  
                    href="/collections/all"
                  
                  class="button button--secondary"
                >Shop all</a></div></div>
  </div>
</div>


</section><section id="shopify-section-template--22398610931991__featured_collection" class="shopify-section section"><link href="//593cae-fe.myshopify.com/cdn/shop/t/1/assets/component-card.css?v=170127402091165654191713633745" rel="stylesheet" type="text/css" media="all" />
<link href="//593cae-fe.myshopify.com/cdn/shop/t/1/assets/component-price.css?v=70172745017360139101713633745" rel="stylesheet" type="text/css" media="all" />

<link href="//593cae-fe.myshopify.com/cdn/shop/t/1/assets/component-slider.css?v=142503135496229589681713633745" rel="stylesheet" type="text/css" media="all" />
<link href="//593cae-fe.myshopify.com/cdn/shop/t/1/assets/template-collection.css?v=58558206033505836701713633746" rel="stylesheet" type="text/css" media="all" />

<style data-shopify>.section-template--22398610931991__featured_collection-padding {
    padding-top: 33px;
    padding-bottom: 27px;
  }

  @media screen and (min-width: 750px) {
    .section-template--22398610931991__featured_collection-padding {
      padding-top: 44px;
      padding-bottom: 36px;
    }
  }</style><div class="color-scheme-1 isolate gradient">
  <div class="collection section-template--22398610931991__featured_collection-padding">
    <div class="collection__title title-wrapper title-wrapper--no-top-margin page-width"><h2 class="title inline-richtext h2 scroll-trigger animate--slide-in">
          Featured products
        </h2></div>

    <slider-component class="slider-mobile-gutter page-width page-width-desktop scroll-trigger animate--slide-in">
      <ul
        id="Slider-template--22398610931991__featured_collection"
        class="grid product-grid contains-card contains-card--product contains-card--standard grid--4-col-desktop grid--2-col-tablet-down"
        role="list"
        aria-label="Slider"
      ><li
            id="Slide-template--22398610931991__featured_collection-1"
            class="grid__item scroll-trigger animate--slide-in"
            
              data-cascade
              style="--animation-order: 1;"
            
          >
            

<link href="//593cae-fe.myshopify.com/cdn/shop/t/1/assets/component-rating.css?v=179577762467860590411713633745" rel="stylesheet" type="text/css" media="all" />
<link href="//593cae-fe.myshopify.com/cdn/shop/t/1/assets/component-volume-pricing.css?v=56284703641257077881713633745" rel="stylesheet" type="text/css" media="all" />
<div class="card-wrapper product-card-wrapper underline-links-hover">
    <div
      class="
        card card--standard
         card--text
        
        
        
        
        
      "
      style="--ratio-percent: 100%;"
    >
      <div
        class="card__inner color-scheme-2 gradient ratio"
        style="--ratio-percent: 100%;"
      ><div class="card__content">
          <div class="card__information">
            <h3
              class="card__heading"
              
                id="title-template--22398610931991__featured_collection-9275866611991"
              
            >
              <a
                href="/products/sabu99-link-situs-login-sabu99-judi-Mahyong Ways-tergacor-asia-2024"
                id="StandardCardNoMediaLink-template--22398610931991__featured_collection-9275866611991"
                class="full-unstyled-link"
                aria-labelledby="StandardCardNoMediaLink-template--22398610931991__featured_collection-9275866611991 NoMediaStandardBadge-template--22398610931991__featured_collection-9275866611991"
              >
                <?php echo $BRANDS ?> 🧚 Link Situs Login <?php echo $BRANDS ?> Judi Mahyong Ways Tergacor Asia 2024 !
              </a>
            </h3>
          </div>
          <div class="card__badge bottom left"><span
                id="NoMediaStandardBadge-template--22398610931991__featured_collection-9275866611991"
                class="badge badge--bottom-left color-scheme-3"
              >Sold out</span></div>
        </div>
      </div>
      <div class="card__content">
        <div class="card__information">
          <h3
            class="card__heading h5"
            
          >
            <a
              href="/products/sabu99-link-situs-login-sabu99-judi-Mahyong Ways-tergacor-asia-2024"
              id="CardLink-template--22398610931991__featured_collection-9275866611991"
              class="full-unstyled-link"
              aria-labelledby="CardLink-template--22398610931991__featured_collection-9275866611991 Badge-template--22398610931991__featured_collection-9275866611991"
            >
              <?php echo $BRANDS ?> 🧚 Link Situs Login <?php echo $BRANDS ?> Judi Mahyong Ways Tergacor Asia 2024 !
            </a>
          </h3>
          <div class="card-information"><span class="caption-large light"></span>
<div
  class="
    price  price--sold-out"
>
  <div class="price__container"><div class="price__regular"><span class="visually-hidden visually-hidden--inline">Regular price</span>
        <span class="price-item price-item--regular">
          Rp 0,00 IDR
        </span></div>
    <div class="price__sale">
        <span class="visually-hidden visually-hidden--inline">Regular price</span>
        <span>
          <s class="price-item price-item--regular">
            
              
            
          </s>
        </span><span class="visually-hidden visually-hidden--inline">Sale price</span>
      <span class="price-item price-item--sale price-item--last">
        Rp 0,00 IDR
      </span>
    </div>
    <small class="unit-price caption hidden">
      <span class="visually-hidden">Unit price</span>
      <span class="price-item price-item--last">
        <span></span>
        <span aria-hidden="true">/</span>
        <span class="visually-hidden">&nbsp;per&nbsp;</span>
        <span>
        </span>
      </span>
    </small>
  </div></div>

</div>
        </div><div class="card__badge bottom left"><span
              id="Badge-template--22398610931991__featured_collection-9275866611991"
              class="badge badge--bottom-left color-scheme-3"
            >Sold out</span></div>
      </div>
    </div>
  </div>
          </li></ul></slider-component></div>
</div>


</section>
  </div>
  </body>
</html>
