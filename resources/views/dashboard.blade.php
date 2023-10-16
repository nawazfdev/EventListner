<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <button id="subscribeBtn" class="btn btn-primary">Subscribe</button>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- {{ __("You're logged in!") }} -->
                    <form method="POST" action="{{ route('posts.store') }}">
            @csrf
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="content">Content:</label>
                <textarea name="content" class="form-control" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    // Get the user's ID (you can replace this with your own method)
    var userId = <?php echo auth()->user()->id; ?>;
    
    // Add an event listener to the button
    document.getElementById("subscribeBtn").addEventListener("click", function () {
        // Send the user's ID to your controller using an AJAX request
        // Replace 'your_controller_url' with the actual URL of your controller
        $.ajax({
            url: 'posts.subscribe',
            type: 'POST',
            data: {
                userId: userId
            },
            success: function (response) {
    dd('message recieve successfully');
            },
            error: function (error) {
                // Handle errors (if any)
                console.error(error);
            }
        });
    });
</script>
