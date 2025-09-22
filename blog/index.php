
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-------- META TAGS  -------->
        <meta name="google-adsense-account" content="ca-pub-4828179335177828">
    <meta name="description"
        content="03003006220 | 03453406220 | The Army Dog Center is a premier facility dedicated to the training, care, and rehabilitation of military working dogs. Our team consists of experienced trainers, veterinarians, and animal behaviorists who understand the unique needs of these courageous animals.">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="https://blog.armydogcenter.org.pk/">

    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="Army Dog Center Pakistan | 03003006220 | 03453406220">
    <meta property="og:description"
        content="03003006220 | 03453406220 | The Army Dog Center is a premier facility dedicated to the training, care, and rehabilitation of military working dogs. Our team consists of experienced trainers, veterinarians, and animal behaviorists who understand the unique needs of these courageous animals.">
    <meta property="og:url" content="https://blog.armydogcenter.org.pk/">
    <meta property="og:type" content="website">
  <meta property="og:image" content="https://armydogcenter.org.pk/images/dogimg-14.jpeg">
    <title>Army Dog Center | Our Blog</title>
    
       <!-- Twitter Card -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="Army Dog Center Pakistan | 03003006220 | 03453406220">
    <meta name="twitter:description" content="        
             چوری، ڈکیتی، قتل اور اغوا جیسے جرائم کے خلاف فوری مدد کے لیے ہمہ وقت دستیاب۔ ہمارے ماہر کتے جرائم کے نشانات ڈھونڈنے اور اہم شواہد فراہم کرنے میں مددگار ثابت ہوتے ہیں۔ ہم 24/7 ہر جگہ خدمات فراہم کرتے ہیں تاکہ آپ کو مکمل تحفظ اور اطمینان حاصل ہو۔
             
            ">
    <meta name="twitter:image" content="https://armydogcenter.org.pk/images/dogimg-14.jpeg">
    <!-- Favicon link -->
    <link rel="icon" href="https://armydogcenter.org.pk/images/logo.webp" type="image/x-icon">
    <link rel="shortcut icon" href="https://armydogcenter.org.pk/images/logo.webp" type="image/x-icon">
    <!------- JSON - LD ---------->
    <script type="application/ld+json">
            {
              "@context": "https://schema.org",
              "@type": "WebSite",
              "name": "Army Dog Center Pakistan | 03003006220 | 03453406220",
              "url": "https://blog.armydogcenter.org.pk/",
              "potentialAction": {
                "@type": "SearchAction",
                "target": "https://blog.armydogcenter.org.pk/search?query={search_term_string}",
                "query-input": "required name=search_term_string"
              }
            }
            </script>


</head>

<body>
     <?php
include '../includes/header.php';
?>
    <div class="flex flex-col items-center justify-center text-center gap-4 p-4">
        <h2 class="my-4 text-teal-500 font-bold text-2xl sm:text-5xl tracking-wider uppercase">Our blog </h2>
        <h3 class="text-lg sm:text-xl text-gray-800 font-semibold text-center">Contact us : 03003006220 / 03453406220</h3>
        <p class="mb-4 leading-relaxed text-gray-600 text-sm w-[75%] text-center">Stay updated with our latest news, training tips, and success stories from the Army Dog Center.</p>
    </div>
    <section class="p-6 flex flex-row-reverse flex-wrap items-end justify-end gap-8 overflow-x-hidden">
        <!-- BLOG POST TEMPLATE -->
        <?php
        global $pdo;
include '../config/config.php';
try {
    $stmt = $pdo->query("SELECT id, title, description, image, url, created_at FROM blog ORDER BY created_at DESC");
    while ($blog = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // Format the date
        $date = new DateTime($blog['created_at']);
        $formatted_date = $date->format('j F, Y'); // Will output like "12 December, 2024"
        
        // Strip HTML tags from description and limit length
        $description = strip_tags($blog['description']);
        $description = (strlen($description) > 90) ? substr($description, 0, 90) . '...' : $description;
        
        // Strip HTML tags from title and limit length
        $title = strip_tags($blog['title']);
        $title = (strlen($title) > 50) ? substr($title, 0, 50) . '...' : $title;

        $readMoreUrl = !empty($blog['url']) ? $blog['url'] : "blogpost.php?id=" . $blog['id'];
        ?>
       <div class="bg-gray-100 w-[300px] rounded-lg border border-gray-500 shadow-sm">
    <a href="<?= $readMoreUrl ?>">
        <div class="flex justify-center items-center h-52">
            <?php if ($blog['image']): ?>
                <img class="object-cover h-full w-full" src="admin/uploads/<?= htmlspecialchars($blog['image']) ?>" alt="<?= htmlspecialchars($title) ?>">
            <?php else: ?>
                <div class="flex items-center justify-center bg-gray-200 h-full w-full">
                    <span class="text-gray-500">No Image</span>
                </div>
            <?php endif; ?>
        </div>
        <div class="p-4 sm:p-6">
            <h2 class="text-lg font-medium text-gray-900"><?= htmlspecialchars($title) ?></h2>
            <p class="mt-2 text-sm text-gray-500 line-clamp-3">
                <?= substr($description, 0, 150) . '...' ?>
            </p>
            <span class="group mt-4 inline-flex items-center gap-1 text-sm font-medium text-blue-600">
                Read more
                <span aria-hidden="true" class="block transition-all group-hover:ms-0.5 rtl:rotate-180">→</span>
            </span>
        </div>
    </a>
</div>

        <?php
    }
} catch(PDOException $e) {
    echo "<div class='text-red-500'>Error loading blog posts: " . $e->getMessage() . "</div>";
}
?>


    </section>
    <script src="https://cdn.tailwindcss.com"></script>
      <?php
include '../includes/footer.php';
?>
</body>

</html>