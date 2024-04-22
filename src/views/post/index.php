<?php use App\Helpers\Helpers;

include __DIR__ . '/../partials/__header.php'; ?>
<div class="grid grid-cols-12">
    <div class="col-span-3">
        <div class="w-full">
            <nav class="py-4">
                <a href="/" class="block py-3 px-2 hover:bg-gray-100 cursor-pointer">
                    Home
                </a>
                <a href="/profile" class="block py-3 px-2 hover:bg-gray-100 cursor-pointer">
                    Profile
                </a>
                <a href="/posts" class="block py-3 px-2 bg-gray-100 cursor-pointer">
                    Posts
                </a>
                <a href="/categories" class="block py-3 px-2 hover:bg-gray-100 cursor-pointer">
                    Categories
                </a>
            </nav>
        </div>
    </div>
    <div class="col-span-9 overflow-auto max-h-screen bg-gray-100 h-screen px-4 py-3">
        <div class="block w-full overflow-x-auto  max-h-[400px]  overflow-y-auto">
            <table class="items-center bg-transparent w-full border-collapse">
                <thead class="bg-white sticky top-0">
                <tr>
                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                        Post Title
                    </th>
                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                        Post Image
                    </th>
                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                        Category
                    </th>
                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                        Action
                    </th>
                </tr>
                </thead>

                <tbody>
                <?php foreach ($this->posts as $post): ?>
                    <tr>
                        <th class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left text-blueGray-700 ">
                            <?= $post->title ?>
                        </th>
                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 ">
                            <div class="h-[70px] w-[70px] mt-3">
                                <img alt="<?= $post->title ?>" src="<?= Helpers::getImage($post->image); ?>"  class="w-full h-full">
                            </div>
                        </td>
                        <td class="capitalize border-t-0 px-6 align-center border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                            <?= $post->category->name ?>
                        </td>
                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                            <div class="flex gap-x-2 items-center">
                                <a href="/posts/delete?post_id=<?= $post->id ?>" class="bg-red-500 text-white outline-0 px-3 py-2">Delete</a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>

            </table>

    </div>
</div>
<?php include __DIR__ . '/../partials/__footer.php'; ?>
