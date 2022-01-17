<?php
class Evenement{

    private $connexion;
    private $table = "artiste"; // Table dans la base de données

    // Propriétés
    public $id;
    public $nom;
    public $type;
    public $date;
    public $nbPlaces;

    /**
     * Constructeur avec $db pour la connexion à la base de données
     *
     * @param $db
     */
    public function __construct($db){
        $this->connexion = $db;
    }


    /**
     * Créer un artiste
     *
     * @return void
     */
    public function creer(){

        // Ecriture de la requête SQL en y insérant le nom de la table
        $sql = "INSERT INTO " . $this->table . " SET nom=:nom, nom=:nom, type=:type, date=:date, nbPlaces=:nbPlaces ";

        // Préparation de la requête
        $query = $this->connexion->prepare($sql);

        // Protection contre les injections
        $this->nom=htmlspecialchars(strip_tags($this->nom));
        $this->type=htmlspecialchars(strip_tags($this->type));
        $this->date=htmlspecialchars(strip_tags($this->date));
        $this->nbPlaces=htmlspecialchars(strip_tags($this->nbPlaces));


        // Ajout des données protégées
        $query->bindParam(":nom", $this->nom);
        $query->bindParam(":type", $this->type);
        $query->bindParam(":date", $this->date);
        $query->bindParam(":nbPlaces", $this->nbPlaces);

        // Exécution de la requête
        if($query->execute()){
            return true;
        }
        return false;
    }



    /**
     * Lecture des artistes
     *
     * @return void
     */
    public function lire(){
        // On écrit la requête
        $sql = "SELECT id, nom, date, type, nbPlaces FROM " . $this->table . " ORDER BY date ";

        // On prépare la requête
        $query = $this->connexion->prepare($sql);

        // On exécute la requête
        $query->execute();

        // On retourne le résultat
        return $query;
    }

    /**
     * Lire un produit
     *
     * @return void
     */
    public function lireUn(){
        // On écrit la requête
        $sql = "SELECT * FROM " . $this->table . " id = ? LIMIT 0,1";

        // On prépare la requête
        $query = $this->connexion->prepare( $sql );

        // On attache l'id
        $query->bindParam(1, $this->id);

        // On exécute la requête
        $query->execute();

        // on récupère la ligne
        $row = $query->fetch(PDO::FETCH_ASSOC);

        // On hydrate l'objet
        $this->nom = $row['nom'];
        $this->type = $row['type'];
        $this->date = $row['date'];
        $this->nbPlaces = $row['nbPlaces'];
    }


    /**
     * Mettre à jour un artiste
     *
     * @return void
     */
    public function modifier(){
        // On écrit la requête
        $sql = "UPDATE " . $this->table . " SET pseudo = :pseudo, nom = :nom, prenom = :prenom, role = :role, spotify = :spotify WHERE id = :id";

        // On prépare la requête
        $query = $this->connexion->prepare($sql);

        // On sécurise les données
        $this->pseudo=htmlspecialchars(strip_tags($this->pseudo));
        $this->nom=htmlspecialchars(strip_tags($this->nom));
        $this->prenom=htmlspecialchars(strip_tags($this->prenom));
        $this->role=htmlspecialchars(strip_tags($this->role));
        $this->spotify=htmlspecialchars(strip_tags($this->spotify));

        // On attache les variables
        $query->bindParam(':pseudo', $this->pseudo);
        $query->bindParam(':nom', $this->nom);
        $query->bindParam(':prenom', $this->prenom);
        $query->bindParam(':role', $this->role);
        $query->bindParam(':spotify', $this->spotify);
        $query->bindParam(':id', $this->id);


        // On exécute
        if($query->execute()){
            return true;
        }

        return false;
    }

    /**
     * Supprimer un produit
     *
     * @return void
     */
    public function supprimer(){
        // On écrit la requête
        $sql = "DELETE FROM " . $this->table . " WHERE id = ?";

        // On prépare la requête
        $query = $this->connexion->prepare( $sql );

        // On sécurise les données
        $this->id=htmlspecialchars(strip_tags($this->id));

        // On attache l'id
        $query->bindParam(1, $this->id);

        // On exécute la requête
        if($query->execute()){
            return true;
        }

        return false;
    }



}