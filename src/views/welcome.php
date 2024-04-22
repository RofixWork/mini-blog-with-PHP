<?php use App\Helpers\Helpers;

include __DIR__ . '/partials/__header.php'; ?>
<div class="grid grid-cols-12">
    <div class="col-span-3">
        <div class="w-full">
            <nav class="py-4">
                <a href="/" class="py-3 block px-2 bg-gray-100 cursor-pointer">
                    Home
                </a>
                <a href="/profile" class="py-3 block px-2 hover:bg-gray-100 cursor-pointer">
                    Profile
                </a>
                <a href="/posts" class="block py-3 px-2 hover:bg-gray-100 cursor-pointer">
                    Posts
                </a>
                <a href="/categories" class="block py-3 px-2 hover:bg-gray-100 cursor-pointer">
                    Categories
                </a>
            </nav>
        </div>
    </div>
    <div class="col-span-9 overflow-auto max-h-screen bg-gray-100 h-screen px-4 py-3">
        <div class="bg-white shadow px-4 py-2">
            <?php include __DIR__ . "/components/Form.php"; ?>
        </div>
<!--posts-->
        <div class="mt-2">
            <?php foreach ($this->posts as $post) : ?>
                <!--            post-->
                <div class="mb-3 bg-white shadow px-4 py-2">
                    <h3 class="text-gray-400 mb-1 text-sm font-mono"><?= $post->updated_at->format('d/m/Y h:i a') ?></h3>
                    <h3 class="text-2xl font-bold text-gray-800 capitalize"><?= $post->title ?></h3>
                    <div class="h-[300px] w-full mt-3">
                        <img src="<?= Helpers::getImage($post->image); ?>"  class="w-full h-full">
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</div>
<?php include __DIR__ . '/partials/__footer.php'; ?>
