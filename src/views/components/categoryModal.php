<div id="category_modal" class="z-10 opacity-0 invisible w-full min-h-screen top-0 left-0 fixed bg-gray-900/50 flex items-center justify-center">
    <form action="/categories/create" method="post" class="bg-white w-[50%] px-3 py-2 shadow rounded-sm">
        <h2>Create a new Category</h2>
        <input name="name" placeholder="Enter category name Here" type="text" class="my-3 block w-full border border-gray-200 rounded-sm p-2 outline-0 focus:ring-0 ring-gray-300">
        <button class="px-4 py-2 w-full block bg-gray-700 text-white rounded-sm hover:bg-gray-900" type="submit">Create</button>
        <button id="btn_close_model" class="mt-2 px-4 py-2 w-full block bg-red-700 text-white rounded-sm hover:bg-red-900" type="button">Close</button>
    </form>
</div>
