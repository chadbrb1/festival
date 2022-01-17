<?php
class Artiste{

	private $connexion;
    private $table = "artiste"; // Table dans la base de données

    // Propriétés
    public $id;
    public $pseudo;
    public $nom;
    public $prenom;
    public $role;
    public $spotify;

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
    $sql = "INSERT INTO " . $this->table . " SET pseudo=:pseudo, nom=:nom, prenom=:prenom, role=:role, spotify=:spotify ";

    // Préparation de la requête
    $query = $this->connexion->prepare($sql);

    // Protection contre les injections
    $this->pseudo=htmlspecialchars(strip_tags($this->pseudo));
    $this->nom=htmlspecialchars(strip_tags($this->nom));
    $this->prenom=htmlspecialchars(strip_tags($this->prenom));
    $this->role=htmlspecialchars(strip_tags($this->role));
    $this->spotify=htmlspecialchars(strip_tags($this->spotify));


    // Ajout des données protégées
    $query->bindParam(":pseudo", $this->pseudo);
    $query->bindParam(":nom", $this->nom);
    $query->bindParam(":prenom", $this->prenom);
    $query->bindParam(":role", $this->role);
    $query->bindParam(":spotify", $this->spotify);

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
    $sql = "SELECT id, pseudo, nom, prenom, role, spotify FROM " . $this->table . " ORDER BY pseudo ";

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
        $sql = "SELECT * FROM " . $this->table . "  WHERE id = ? LIMIT 0,1";

        // On prépare la requête
        $query = $this->connexion->prepare( $sql );

        // On attache l'id
        $query->bindParam(1, $this->id);

        // On exécute la requête
        $query->execute();

        // on récupère la ligne
        $row = $query->fetch(PDO::FETCH_ASSOC);

        // On hydrate l'objet
        $this->pseudo = $row['pseudo'];
        $this->nom = $row['nom'];
        $this->prenom = $row['prenom'];
        $this->role = $row['role'];
        $this->spotify = $row['spotify'];
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