<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Ajouter Etudiant</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.tailwindcss.com"></script>
</head>


<body>
    <!-- Modal -->
    <div id="contactFormModal" class="fixed z-10 inset-0 overflow-y-auto hidden">
        <div class="flex items-center justify-center min-h-screen">
            <div class="bg-white w-1/2 p-6 rounded shadow-md">
                <div class="flex justify-end">
                    <!-- Close Button -->
                    <button id="closeContactForm" class="text-gray-700 hover:text-red-500">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>


                <form method="post" action="add_student.php">

                    <div class="py-8">
                        <center>
                            <span class="text-2xl font-semibold">Ajouter un Etudiant
                            </span>
                        </center>
                    </div>

                    <div class="mt-4">
                        <label class="block font-medium text-sm text-gray-700" for="id" value="id" />
                        <input type='number' name='id' placeholder='Identifiant'
                            class="w-full rounded-md py-2.5 px-4 border text-sm outline-orange-500" />
                    </div>

                    <div class="mt-4">
                        <label class="block font-medium text-sm text-gray-700" for="nom" value="nom" />
                        <input type='text' name='nom' placeholder='Nom et prénom'
                            class="w-full rounded-md py-2.5 px-4 border text-sm outline-orange-500" />
                    </div>
                    <div class="mt-4">
                        <label class="block font-medium text-sm text-gray-700" for="email" value="email" />
                        <input type='text' name='email' placeholder='Adresse Email'
                            class="w-full rounded-md py-2.5 px-4 border text-sm outline-orange-500" />
                    </div>



                    <div class="mt-4">
                        <select id="sexe" name="sexe"
                            class="w-full rounded-md py-2.5 px-4 border text-sm outline-orange-500" required>
                            <option value="" disabled selected hidden>Sexe</option>
                            <option value="Homme">Homme</option>
                            <option value="Femme">Femme</option>
                        </select>
                    </div>


                    <div class="mt-4">
                        <select id="id_niveau" name="id_niveau"
                            class="w-full rounded-md py-2.5 px-4 border text-sm outline-orange-500" required>
                            <option value="" disabled selected hidden>Niveau</option>
                            <option value="1ere année">1ère année</option>
                            <option value="2éme année">2ème année</option>
                            <option value="3éme année">3ème année</option>
                        </select>
                    </div>

                 


                    <div class="mt-5">
                        <button type="submit" name="registerbtn"
                            class='ms-4 inline-flex items-center px-4 py-2 bg-orange-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-800 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150'
                            >
                            Ajouter Etudiant
                        </button>
                    </div>
            </div>
            </form>
        </div>
    </div>
    </div>
    </div>

    <script>
        // JavaScript to toggle the modal
        const openContactFormButton = document.getElementById('openContactForm');
        const closeContactFormButton = document.getElementById('closeContactForm');
        const contactFormModal = document.getElementById('contactFormModal');

        openContactFormButton.addEventListener('click', () => {
            contactFormModal.classList.remove('hidden');
        });

        closeContactFormButton.addEventListener('click', () => {
            contactFormModal.classList.add('hidden');
        });
    </script>


</body>

</html>