<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Etudiants</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="../assets/css/tailwind.output.css" />
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
  <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>
  <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen}">
    <!-- Desktop sidebar -->
    <aside class="z-20 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0">
      <div class="py-4 text-gray-500 dark:text-gray-400">
        <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="#">
          Admin
        </a>
        <ul class="mt-6">
          <li class="relative px-6 py-3">
            <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
              href="index.php">
              <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round"
                stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                <path
                  d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                </path>
              </svg>
              <span class="ml-4">Dashboard</span>
            </a>
          </li>
        </ul>
        <ul>
          <li class="relative px-6 py-3">
            <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
              href="Enseignant.php">
              <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round"
                stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                <path
                  d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                </path>
              </svg>
              <span class="ml-4">Enseignant</span>
            </a>
          </li>
          <li class="relative px-6 py-3">
            <span class="absolute inset-y-0 left-0 w-1"
              style="background-color: #fa8231; border-radius: 0 0.5rem 0.5rem 0;"></span>
            <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
              href="Etudiants.php">
              <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round"
                stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                <path
                  d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                </path>
              </svg>
              <span class="ml-4">Etudiants</span>
            </a>
          </li>
        </ul>
    </aside>


    <div class="flex flex-col flex-1">
      <header class="z-10 py-4 bg-white shadow-md dark:bg-gray-800">
      </header>
      <main class="h-full pb-16 overflow-y-auto">
        <div class="container px-6 mx-auto grid">
          <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Liste des Etudiants
          </h2>

          <?php
          // Connexion à la base de données
          $conn = new mysqli("localhost", "root", "", "myissat");

          // Vérifie la connexion
          if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }

          // Requête SQL pour sélectionner tous les enseignants
          $sql = "SELECT * FROM `etudiant`";
          $result = $conn->query($sql);
          ?>


          <!-- New Table -->

          <div class='w-full overflow-hidden rounded-lg shadow-xs'>
            <table class='w-full whitespace-no-wrap'>

              <div class="mt-5 mb-5 ml-6">

                <button id="imprimerQR" type="button"
                  class="inline-block rounded-full border-2 border-orange-500 text-orange-500 hover:border-orange-600 hover:bg-orange-400 hover:bg-opacity-10 hover:text-orange-600 focus:border-orange-700 focus:text-orange-700 active:border-orange-800 active:text-orange-800 dark:border-orange-300 dark:text-orange-300 dark:hover:hover:bg-orange-300 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal transition duration-150 ease-in-out focus:outline-none focus:ring-0">
                  Imprimer QR Codes</button>

                <button id="openContactForm" type="button"
                  class="inline-block rounded-full border-2 border-orange-500 text-orange-500 hover:border-orange-600 hover:bg-orange-400 hover:bg-opacity-10 hover:text-orange-600 focus:border-orange-700 focus:text-orange-700 active:border-orange-800 active:text-orange-800 dark:border-orange-300 dark:text-orange-300 dark:hover:hover:bg-orange-300 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal transition duration-150 ease-in-out focus:outline-none focus:ring-0">
                  Ajouter un etudiant</button>
                <?php include 'Ajouter_etud.php' ?>

              </div>




              <thead>

                <tr
                  class='text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800'>
                  <th class='px-4 py-3'>Identifiant</th>
                  <th class='px-4 py-3'>Nom</th>
                  <th class='px-4 py-3'>Niveau</th>
                  <th class='px-4 py-3'>Groupe</th>
                  <th class='px-4 py-3'>QR_Code</th>
                  <th class='px-4 py-3'>Actions</th>

                </tr>
              </thead>
              <tbody class='bg-white divide-y dark:divide-gray-700 dark:bg-gray-800'>
                <?php
                if ($result->num_rows > 0) {
                  // Parcourir chaque ligne de résultat
                  while ($row = $result->fetch_assoc()) {
                    ?>
                    <tr class='text-gray-700 dark:text-gray-400'>
                      <td class='px-4 py-3'>
                        <div class='flex items-center text-sm'>
                          <div>
                            <p class='font-semibold'><?php echo $row['id']; ?></p>
                          </div>
                        </div>
                      </td>

                      <td class='px-4 py-3 text-sm'>
                        <?php echo $row['nom']; ?>
                      </td>

                      <td class='px-4 py-3 text-sm'>
                        <span class='px-2 py-1 font-semibold leading-tight'>
                          <?php echo $row['id_niveau']; ?>
                        </span>
                      </td>

                      <td class='px-4 py-3 text-sm'>
                        <span class='px-2 py-1 font-semibold leading-tight'>
                          <?php echo $row['groupe_nom']; ?>
                        </span>
                      </td>

                      <td class='px-4 py-3 text-sm'>
                        <span class='px-2 py-1 font-semibold leading-tight'>
                          <?php echo "<img src='data:image/png;base64," . base64_encode($row['qr_code']) . "'>"; ?>
                        </span>
                      </td>

                      <td class='text-sm'>

                        <a href="Modifier_etud.php?updateid=<?php echo $row['id']; ?>" role="button"
                          class="inline-block rounded-full bg-amber-500 text-neutral-50 shadow-[0_4px_9px_-4px_rgba(51,45,45,0.7)] hover:bg-amber-600 hover:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.2),0_4px_18px_0_rgba(51,45,45,0.1)] focus:bg-amber-800 focus:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.2),0_4px_18px_0_rgba(51,45,45,0.1)] active:bg-amber-700 active:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.2),0_4px_18px_0_rgba(51,45,45,0.1)] px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal transition duration-150 ease-in-out focus:outline-none focus:ring-0">
                          Modifier</a>


                        <a href="Supprimer_etud.php?deleteid=<?php echo $row['id']; ?>"
                          onclick="return myFunction('Êtes-vous sûr de vouloir supprimer cet étudiant?')" role="button" class="inline-block rounded-full bg-red-500 text-neutral-50 shadow-[0_4px_9px_-4px_rgba(51,45,45,0.7)] hover:bg-red-600 hover:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.2),0_4px_18px_0_rgba(51,45,45,0.1)] focus:bg-red-800 focus:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.2),0_4px_18px_0_rgba(51,45,45,0.1)] active:bg-red-700 active:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.2),0_4px_18px_0_rgba(51,45,45,0.1)] px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal transition duration-150 ease-in-out focus:outline-none focus:ring-0
                          ">
                          Supprimer</a>

                      </td>

                    </tr>
                    <?php
                  }

                } else {
                  echo "<td>Aucun etudiant trouvé.</td>";
                }
                ?>


              </tbody>

            </table>

          </div>
        </div>

        <?php
        // Fermer la connexion
        $conn->close();
        ?>
        <!-- Bouton pour imprimer les QR Codes -->


        <script>
          document.getElementById('imprimerQR').addEventListener('click', function () {
            window.print();
          });
          function myFunction() {
            var txt;
            if (confirm("vous avez supprimer un champ !")) {
              txt = "You pressed OK!";
            } else {
              txt = "You pressed Cancel!";
            }
          }
        </script>

</body>

</html>