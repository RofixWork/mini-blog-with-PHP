<?php include __DIR__ . '/../partials/__header.php'; ?>

<div class="grid grid-cols-12">
    <aside class="col-span-3">
        <div class="w-full">
            <nav class="py-4">
                <a href="/" class="block py-3 px-2 hover:bg-gray-100 cursor-pointer">
                    Home
                </a>
                <a href="" class="block py-3 px-2 hover:bg-gray-100 cursor-pointer">
                    Profile
                </a>
                <a href="/posts" class="block py-3 px-2 hover:bg-gray-100 cursor-pointer">
                    Posts
                </a>
                <a href="/categories" class="block py-3 px-2 bg-gray-100 cursor-pointer">
                    Categories
                </a>
            </nav>
        </div>
    </aside>
    <div class="col-span-9 overflow-auto max-h-screen bg-gray-100 h-screen px-4 py-3">
<!--        update category form-->
        <form action="/categories/update" method="post" class="bg-white w-full px-3 py-2 shadow rounded-sm">
            <h2>Update Category</h2>
            <input value="<?= $this->category->id ?>" name="id" type="hidden" />
            <div class="my-3">
                <input name="name" placeholder="Enter a new category name Here" type="text" class="block w-full border border-gray-200 rounded-sm p-2 outline-0 focus:ring-0 ring-gray-300" value="<?= $this->category->name; ?>">
<!--                print message error-->
                <?php if(isset($_COOKIE['category_message_error'])): ?>
                    <span class="text-red-500"><?= $_COOKIE['category_message_error']  ?></span>
                <?php endif; ?>
                <!--                print message error-->
            </div>
<!--            actions [update and back]-->
            <button class="px-4 py-2 w-full block bg-gray-700 text-white rounded-sm hover:bg-gray-900" type="submit">Update</button>
            <a href="/categories" class="mt-2 text-center px-4 py-2 w-full block bg-red-700 text-white rounded-sm hover:bg-red-900" type="button">Back</a>
        </form>
    </div>
    <?php include __DIR__ . '/../partials/__footer.php'; ?>
