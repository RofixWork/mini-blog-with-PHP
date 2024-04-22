
<form action="/post/store" method="post" enctype="multipart/form-data">
    <?php if(isset($_COOKIE['post_message_error'])): ?>
        <div class="text-white bg-red-500 px-3 py-2 text-center mb-2"><?= $_COOKIE['post_message_error']  ?></div>
    <?php endif; ?>
    <div class="mb-3">
        <textarea name="title" class="block w-full border border-gray-200 rounded-sm p-2 outline-0 focus:ring-0 ring-gray-300" rows="3" placeholder="what's on your mind"></textarea>
    </div>
    <div class="mb-3">
        <select class="block w-full p-2 border border-gray-200 outline-0" name="category" id="">
            <option value="">__choose__category</option>
            <?php  foreach ($this->categories as $category): ?>
                <option value="<?= $category->id ?>"><?= $category->name ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <div class="flex gap-x-3 items-center">
            <label for="image">Post Image:</label>
            <input class="block flex-1 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-gray-50 file:text-gray-700 hover:file:bg-gray-100" id="post_image" type="file" name="post_image">
        </div>
    </div>

    <button class="px-4 py-2 w-full block bg-gray-700 text-white rounded-sm hover:bg-gray-900" type="submit">Post</button>
</form>