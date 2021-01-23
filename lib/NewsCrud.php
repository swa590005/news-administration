<?php
class NewsCrud
{
    
    // Insert news data into news_properties table
    public function insertData($post)
    {
        
        $pdo = new PDO('mysql:host=localhost;dbname=news_db', 'root','password');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO news_properties (headline, content, activeflag) VALUES (?,?,?)";
        $statement= $pdo->prepare($sql);
        $result=$statement->execute([$_POST['headline'], $_POST['content'],1 ]);
        if ($result==true) {
            header("Location:Overview.php?msg1=insert");
        }else{
            echo "Registration failed try again!";
        }
    }

    // Fetch news records for show listing
    public function displayData()
    {
        $pdo = new PDO('mysql:host=localhost;dbname=news_db', 'root','password');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $statement=$pdo->prepare('Select * from news_properties');
        $statement->execute();
        $newsArray = $statement->fetchAll(\PDO ::FETCH_ASSOC);

        return $newsArray;

        
    }

    // Fetch single data for edit from news_properties table
    public function displyaRecordById($id)
    {
        $pdo = new PDO('mysql:host=localhost;dbname=news_db', 'root','password');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $statement=$pdo->prepare('Select * from news_properties where id = :id');
        $statement->execute(array('id' => $id));
        $newsArray = $statement->fetch(\PDO ::FETCH_ASSOC);
        if(!$newsArray)
        {
            return null;
        }
        return $newsArray;
    }

    // Update news data into news_properties table
    public function updateRecord($postData)
    {
        $pdo = new PDO('mysql:host=localhost;dbname=news_db', 'root','password');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE news_properties SET headline = :headline, 
            content = :content, 
            activeflag = :activeflag 
            WHERE id = :newsId";
        $statement = $pdo->prepare($sql);                                  
        $statement->bindParam(':headline', $_POST['headline'], PDO::PARAM_STR);       
        $statement->bindParam(':content', $_POST['content'], PDO::PARAM_STR);    
        $statement->bindParam(':activeflag', $_POST['activeflag'], PDO::PARAM_STR);  
        $statement->bindParam(':newsId', $_POST['newsId'], PDO::PARAM_INT);   
        $result=$statement->execute();
        if ($result==true) {
            header("Location:Overview.php?msg2=update");
        }else{
            echo "Registration failed try again!";
        }
        
    }


    // Delete customer data from customer table
    public function deleteRecord($id)
    {
        $pdo = new PDO('mysql:host=localhost;dbname=news_db', 'root', 'password');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $statement=$pdo->prepare('delete from news_properties where id = :id');
        $result=$statement->execute(array('id' => $id));
        if ($result==true) {
            header("Location:Overview.php?msg3=delete");
        } else {
            echo "Record does not delete try again";
        }
    }   

}

?>
