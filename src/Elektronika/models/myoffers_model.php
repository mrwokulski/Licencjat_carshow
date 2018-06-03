<?php

class Myoffers_Model extends Model
{

	function __construct()
    {
		parent::__construct();
		Session::init();
	}

	public function getMyOffers()
    {

		$me = View::showArrayValue('log',6);
		$offersQuery = $this->db->prepare("SELECT DISTINCT o.* FROM offer o WHERE o.user = :id_user AND o.actual = 1;");
		$offersQuery->bindValue("id_user", $me, PDO::PARAM_INT);
		$offersQuery->execute();
		$offers = $offersQuery->fetchAll();

		return $offers;
	}

	public function closeOffer($id)
    {
        $offerQuery = $this->db->prepare('SELECT actual FROM offer WHERE id=:id');
        $offerQuery->bindValue(':id', $id, PDO::PARAM_INT);
        $offerQuery->execute();
        $act = $offerQuery->fetch()['actual'];

        if($act == 1)
            $act = 0;
        else
            $act = 1;

        $archiveQuery = $this->db->prepare('UPDATE offer SET actual = :act WHERE id=:id');
        $archiveQuery->bindValue(':act', $act, PDO::PARAM_INT);
        $archiveQuery->bindValue(':id', $id, PDO::PARAM_INT);
        $archiveQuery->execute();

        header('Location: '.URL.'myoffers');
    }
}