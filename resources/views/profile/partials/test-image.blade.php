<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            Profile Image
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            Update your profile image
        </p>
    </header>

    <img src="http://localhost:8000/images/test-image.png" alt="profile image">

    <form action="{{ route('profile.image') }}" method="POST" class="p-4">
        @csrf
        @method('post')

    <input type="submit" value="Send Request" name="elo"/>

    </form>

</section>

