<?php
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "myissat";
                        $conn = new mysqli($servername, $username, $password, $dbname);

                        // Vérifie la connexion
                        if ($conn->connect_error) {
                            die("La connexion a échoué : " . $conn->connect_error);
                        }

                        // Requête pour récupérer les niveaux
                        $query_niveaux = "SELECT `id`, `nom` FROM `niveau`";
                        $result_niveaux = $conn->query($query_niveaux);
                        ?>
                        <select id="niveau" name="niveau" class='border rounded-md px-3 py-2 ml-4'>
                            <option value="">Sélectionnez un niveau</option>

                            <?php
                            // Affichage des options des niveaux
                            while ($row_niveau = $result_niveaux->fetch_assoc()) {
                                echo "<option value='" . $row_niveau['id'] . "'>" . $row_niveau['nom'] . "</option>";
                            }
                            ?>
                        </select>