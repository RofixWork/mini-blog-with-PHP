<?php use App\Helpers\Helpers;

include __DIR__ . '/../partials/__header.php'; ?>
<div class="grid grid-cols-12">
    <div class="col-span-3">
        <div class="w-full">
            <nav class="py-4">
                <a href="/" class="block py-3 px-2 hover:bg-gray-100 cursor-pointer">
                    Home
                </a>
                <a href="/profile" class="block py-3 px-2 bg-gray-100 cursor-pointer">
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
        <div>
            <h3 class="text-gray-900 text-2xl mb-2">Posts Count: <span><?= $this->postsCount ?></span></h3>
            <h3 class="text-gray-900 text-2xl ">Categories Count: <span><?= $this->categoriesCount ?></span></h3>
        </div>
    </div>
    <?php include __DIR__ . '/../partials/__footer.php'; ?>
