<?php
    require_once 'db_connect.php';
    function getAllProjects(){
        $pdo = getDBConnection();
                    
        $sql = "SELECT * FROM projects proj
                LEFT JOIN projects_skills projski ON proj.idprojects = projski.idprojects
                LEFT JOIN skills s ON s.idskills = projski.idskills;";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();

        $projects = [];

        foreach($result as $row){

            //Si mon projet n'est pas encore dans le tableau 
            if(isset($projects[$row['idprojects']]) == false)
            {
                $project = [
                    'idprojects' => $row['idprojects'],
                    'title' => $row['title'],
                    'description' => $row['description'],
                    'image' => $row['image'],
                    'github_link' => $row['github_link'],
                    'project_link' => $row['project_link'],
                    'skills' => []
                ];
                $projects[$row['idprojects']] = $project;
            }
            
            //un skill est présent dans la row ? 
            if(isset($row['idskills'])){
                //je veux ajouter le skill dans le tableau skill
                $projects[$row['idprojects']]['skills'][] = $row['name'];
            }
        }

        return $projects;
    }

    function getAllSkills(){
        $pdo = getDBConnection();

        $sql = "SELECT * FROM skills;";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    function echoValue($row, $name){
        echo htmlspecialchars($row[$name], ENT_QUOTES, 'UTF-8') . "\t";
    }

    function insertProject(
        string $title,
        string $description,
        ?string $image,
        string $github_link,
        string $project_link,
        array $skills
    ): bool {
        $pdo = getDBConnection();

        try {
            $pdo->beginTransaction();

            // 1️⃣ Insert project
            $statement = $pdo->prepare(
                'INSERT INTO projects (title, description, image, github_link, project_link)
                VALUES (:title, :description, :image, :github_link, :project_link)'
            );

            $statement->execute([
                'title'        => $title,
                'description'  => $description,
                'image'        => $image,
                'github_link'  => $github_link,
                'project_link' => $project_link,
            ]);

            $projectId = $pdo->lastInsertId();

            // 2️⃣ Insert skills
            if (!empty($skills)) {
                $skillStmt = $pdo->prepare(
                    'INSERT INTO projects_skills (idprojects, idskills)
                    VALUES (:project_id, :skill_id)'
                );

                foreach ($skills as $skillId) {
                    $skillStmt->execute([
                        'project_id' => $projectId,
                        'skill_id'   => (int)$skillId,
                    ]);
                }
            }

            $pdo->commit();
            return true;

        } catch (PDOException $e) {
            $pdo->rollBack();
            return false;
        }
    }

    function deleteProject($idProjectToDelete){
        $pdo = getDBConnection();
        $statement = $pdo->prepare('DELETE FROM projects 
                    WHERE projects.idprojects = :idProjectToDelete');

        $success = $statement->execute([
            'idProjectToDelete' => $idProjectToDelete
        ]);

        return $success;
    }

    function getUserByEmail($email){
        $pdo = getDBConnection();

        $sql = "SELECT * FROM users WHERE email = :email;";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'email' => $email
        ]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

?>