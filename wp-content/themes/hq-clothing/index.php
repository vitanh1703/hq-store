<?php get_header(); ?>

<main class="max-w-7xl mx-auto px-6 py-12">
    <div class="flex items-center justify-between mb-10">
        <div>
            <h1 class="text-3xl font-black uppercase tracking-tighter text-black">Bộ sưu tập mới</h1>
            <p class="text-gray-500 text-sm mt-1">Khám phá những thiết kế mới nhất từ H&Q</p>
        </div>
        <a href="?all_products=1" class="text-sm font-bold uppercase tracking-widest border-b-2 border-black pb-1 hover:text-gray-500 hover:border-gray-500 transition-colors">
            Xem tất cả
        </a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
        <?php
        // Gọi hàm từ inc/db-queries.php
        $products = get_latest_products(8);

        if ($products) :
            foreach ($products as $product) : ?>
                <div class="group cursor-pointer">
                    <div class="relative aspect-[3/4] overflow-hidden bg-gray-100 rounded-2xl mb-4">
                        <img 
                            src="<?php echo esc_url($product->image_url); ?>" 
                            alt="<?php echo esc_attr($product->name); ?>"
                            class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-500"
                        >
                        <div class="absolute top-4 left-4 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full shadow-sm">
                            <span class="text-[10px] font-black uppercase tracking-widest text-black">
                                <?php echo esc_html($product->brand_text); ?>
                            </span>
                        </div>
                    </div>

                    <div class="space-y-1">
                        <h3 class="font-bold text-gray-900 group-hover:underline decoration-2 underline-offset-4">
                            <?php echo esc_html($product->name); ?>
                        </h3>
                        <p class="text-sm text-gray-500 line-clamp-2">
                            <?php echo esc_html($product->description); ?>
                        </p>
                        <div class="flex items-center gap-2 mt-2">
                            <span class="font-black text-black">Liên hệ</span>
                            <span class="text-xs text-gray-400 line-through">750.000đ</span>
                        </div>
                    </div>
                </div>
            <?php endforeach;
        else : ?>
            <p class="col-span-full text-center text-gray-500 py-20 border-2 border-dashed border-gray-200 rounded-3xl">
                Chưa có sản phẩm nào được cập nhật trong hệ thống.
            </p>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>