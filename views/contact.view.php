<?php require('partials/head.php') ?>
<?php require('partials/nav.php') ?>
<?php require('partials/banner.php') ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <p>Kontaktirajte nas koristeći ovu formu!</p>
    </div>
</main>

<div class="bg-white p-8 rounded-lg shadow-lg">
    <h2 class="text-2xl font-bold mb-6 text-center">Kontakt Forma</h2>
    <form action="/contact" method="POST">
        <div class="mb-4">
            <label for="ime" class="block text-gray-700">Ime:</label>
            <input type="text" id="ime" name="ime" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>
        <div class="mb-4">
            <label for="email" class="block text-gray-700">Email:</label>
            <input type="email" id="email" name="email" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>
        <div class="mb-4">
            <label for="poruka"
                   class="block text-gray-700">Poruka:
            </label>
            <textarea
                    id="poruka"
                    name="poruka"
                    rows="4"
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>

            </textarea>
        </div>
        <div class="text-center">
            <input type="submit" value="Pošalji" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <ul>
            <?php if (isset($errors['email'])) : ?>
                <li class="text-red-500 text-xs mt-2"><?= $errors['email'] ?></li>
            <?php endif; ?>

            <?php if (isset($errors['poruka'])) : ?>
                <li class="text-red-500 text-xs mt-2"><?= $errors['poruka'] ?></li>
            <?php endif; ?>
        </ul>

    </form>
</div>

<?php require('partials/footer.php') ?>
