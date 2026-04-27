<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<nav class="sticky top-0 z-50 bg-white/90 backdrop-blur-md border-b border-gray-100 flex items-center justify-between px-6 md:px-10 py-4 shadow-sm">
    
    <div class="flex items-center gap-4 lg:gap-6 flex-1 relative">
        <button id="nav-button" class="p-2 -ml-2 hover:bg-gray-100 rounded-full transition-colors text-black shrink-0">
            <i data-lucide="menu"></i>
        </button>
        
        <div id="nav-menu" class="hidden md:flex items-center gap-6 lg:gap-8 text-sm font-bold uppercase tracking-widest text-gray-600">
            <a href="<?php echo home_url('/home'); ?>" class="hover:text-black transition-colors">Trang chủ</a>
            
            <div class="relative group">
                <a href="<?php echo home_url('/products'); ?>" class="hover:text-black transition-colors">Sản phẩm</a>
                <div class="absolute hidden group-hover:block top-full left-0 w-56 bg-white border border-gray-100 rounded-xl shadow-xl py-3 z-50 overflow-hidden">
                    <a href="<?php echo home_url('/products'); ?>" class="block px-5 py-3 text-sm font-bold hover:bg-gray-50">Tất cả sản phẩm</a>
                    <?php 
                    global $wpdb;
                    $categories = $wpdb->get_results("SELECT * FROM categories");
                    foreach ($categories as $cat) : ?>
                        <a href="?category=<?php echo $cat->id; ?>" class="block px-5 py-3 text-sm font-medium hover:bg-gray-50">
                            <?php echo esc_html($cat->name); ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="relative group">
                <a href="<?php echo home_url('/news'); ?>" class="hover:text-black transition-colors">Tin tức</a>
                <div class="absolute hidden group-hover:block top-full left-0 w-64 bg-white border border-gray-100 rounded-xl shadow-xl py-3 z-50 overflow-hidden">
                    <a href="<?php echo home_url('/news'); ?>" class="block px-5 py-3 text-sm font-bold hover:bg-gray-50">Tất cả bài viết</a>
                    <?php 
                    $news = get_header_news();
                    foreach ($news as $item) : ?>
                        <a href="?news=<?php echo $item->id; ?>" class="block px-5 py-3 text-sm hover:bg-gray-50">
                            <div class="font-medium"><?php echo esc_html($item->title); ?></div>
                            <div class="text-xs text-gray-500"><?php echo esc_html($item->category); ?></div>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>

            <a href="<?php echo home_url('/aboutus'); ?>" class="hover:text-black transition-colors">About us</a>
            <a href="<?php echo home_url('/faq'); ?>" class="hover:text-gray-500 transition-colors">Hỗ trợ</a>
        </div>
    </div>

    <div class="flex shrink-0 justify-center">
        <a href="<?php echo home_url('/home'); ?>" class="text-3xl font-black tracking-tighter uppercase cursor-pointer hover:opacity-70 transition-opacity text-black">H&Q</a>
    </div>

    <div class="flex items-center justify-end gap-2 md:gap-4 flex-1">
        <a href="<?php echo home_url('/wishlist'); ?>" class="p-2 rounded-full transition-colors hover:bg-gray-100" title="Yêu thích">
            <i data-lucide="heart"></i>
        </a>

        <div class="relative group">
            <a href="<?php echo home_url('/auth'); ?>" class="flex items-center gap-1 p-2 hover:bg-gray-100 rounded-full transition-colors" title="Tài khoản">
                <i data-lucide="user"></i>
            </a>
            </div>

        <a href="<?php echo home_url('/cart'); ?>" class="flex items-center bg-black text-white px-4 md:px-5 py-2.5 rounded-full gap-2 hover:bg-gray-800 transition-all shadow-md ml-1 md:ml-2">
            <span class="text-[10px] md:text-xs font-bold uppercase tracking-widest hidden sm:inline">Giỏ hàng</span>
            <i data-lucide="shopping-bag" size="16"></i>
        </a>
    </div>
</nav>

<script>
    // Kích hoạt Lucide Icons
    document.addEventListener("DOMContentLoaded", () => {
        lucide.createIcons();
    });
</script>