<?php include __DIR__ . '/../partials/__header.php'; ?>
<?php include __DIR__ . '/../components/categoryModal.php'; ?>

<div class="grid grid-cols-12">
    <aside class="col-span-3">
        <div class="w-full">
            <nav class="py-4">
                <a href="/" class="block py-3 px-2 hover:bg-gray-100 cursor-pointer">
                    Home
                </a>
                <a href="/profile" class="block py-3 px-2 hover:bg-gray-100 cursor-pointer">
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
<!--    categories table-->
    <div class="col-span-9 overflow-auto max-h-screen bg-gray-100 h-screen px-4 py-3">
        <div class="flex justify-end mb-3">
            <button class="px-3 py-2 bg-gray-900 text-white" id="btn_add_category">Add Category</button>
        </div>
        <div class="block w-full overflow-x-auto max-h-[400px]  overflow-y-auto">
            <table class="items-center bg-transparent w-full border-collapse ">
                <thead class="bg-white sticky top-0">
                <tr>
                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                        Name
                    </th>
                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                        Actions
                    </th>
                </tr>
                </thead>

                <tbody>
<!--                //print categories-->
                <?php foreach ($this->categories as $category): ?>
                    <tr>
                        <th class="capitalize border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left text-blueGray-700 ">
                            <?= $category->name ?>
                        </th>
                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 ">
                            <div class="flex gap-x-2 items-center">
                                <a href="/categories/edit?category_id=<?= $category->id ?>" class="bg-blue-500 text-white outline-0 px-3 py-2">Edit</a>
                                <a href="/categories/delete?category_id=<?= $category->id ?>" class="bg-red-500 text-white outline-0 px-3 py-2">Delete</a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>

            </table>

        </div>
    </div>
    <script>
        const btnModal = document.querySelector('#btn_add_category'),
            categoryModal = document.querySelector('#category_modal'),
            btnCloseModal = document.querySelector('#btn_close_model');

        btnModal.addEventListener('click', function ()
        {
           if(categoryModal.classList.contains('opacity-0') && categoryModal.classList.contains('invisible'))
           {
               categoryModal.classList.replace('opacity-0', 'opacity-100');
               categoryModal.classList.replace('invisible', 'visible');
           }
        });

        categoryModal.addEventListener('click', function(e) {
            closeModal(e);
        })

        btnCloseModal.addEventListener('click', function(e) {
            closeModal(categoryModal);
        })

        function closeModal(e)
        {
            const item = e.target || e;
            if(item.classList.contains('opacity-100') && item.classList.contains('visible'))
            {
                item.classList.replace('opacity-100', 'opacity-0');
                item.classList.replace('visible', 'invisible');
            }
        }
    </script>
    <?php include __DIR__ . '/../partials/__footer.php'; ?>
