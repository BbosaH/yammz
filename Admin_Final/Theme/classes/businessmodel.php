<?php
class business
{
	private $profile_photo;
	private $name;
	private $country_id; //got from other table
	private $city_id;  //got from other table
	private $address;
	//private $owner_id;  got from other table
	private $who_added_id;  //got from other table
	private $date_added; //today
	private $phone1;
	private $phone2;
	private $email;
	private $website;
	private $banner;
	private $description;
	private $category1_id; //got from other table
	private $category2_id;
	private $category3_id;
	private $subcategory1_id;
	private $subcategory2_id;
	private $subcategory3_id;


	/**
	 * Class Constructor
	 * @param    $profile_photo   
	 * @param    $name   
	 * @param    $country_id   
	 * @param    $city_id   
	 * @param    $address   
	 * @param    $owner_id   
	 * @param    $who_added_id   
	 * @param    $date_added   
	 * @param    $phone1   
	 * @param    $phone2   
	 * @param    $email   
	 * @param    $website   
	 * @param    $banner   
	 * @param    $description   
	 * @param    $category1_id   
	 * @param    $category2_id   
	 * @param    $category3_id   
	 * @param    $subcategory1_id   
	 * @param    $subcategory2_id   
	 * @param    $subcategory3_id   
	 */



	//profile_photo property
	public function getProfilePhoto()
	{
		return $this->profile_photo;
	}
	public function setProfilePhoto($profile_photo)
	{
		 $this->profile_photo= $profile_photo;
	}

	//name property
	public function getName()
	{
		return $this->name;
	}
	public function setName($name)
	{
		 $this->name= $name;
	}

	//country_id property
	public function getCountryId()
	{
		return $this->country_id;
	}
	public function setcountryId($country_id)
	{
		 $this->country_id= $country_id;
	}

	//city_id property
	public function getCityId()
	{
		return $this->city_id;
	}
	public function setCityId($city_id)
	{
		 $this->city_id= $city_id;
	}

	//address property
	public function getAddress()
	{
		return $this->address;
	}
	public function setAddress($address)
	{
		 $this->address= $address;
	}
	//owner_id property
	/*public function getOwnerId()
	{
		return $this->owner_id;
	}
	public function setOwnerId($owner_id)
	{
		 $this->owner_id= $owner_id;
	}*/

	//who_added_id property
	public function getWhoAddedId()
	{
		return $this->who_added_id;
	}
	public function setWhoAddedId($who_added_id)
	{
		 $this->who_added_id= $who_added_id;
	}

	//date_added property
	public function getDateAdded()
	{
		return $this->date_added;
	}
	public function setDateAdded($date_added)
	{
		 $this->date_added= $date_added;
	}

	//phone1 property
	public function getPhone1()
	{
		return $this->phone1;
	}
	public function setPhone1($phone1)
	{
		 $this->phone1= $phone1;
	}

	//phone2 property
	public function getPhone2()
	{
		return $this->phone2;
	}
	public function setPhone2($phone2)
	{
		 $this->phone2= $phone2;
	}

	//email property
	public function getEmail()
	{
		return $this->email;
	}
	public function setEmail($email)
	{
		 $this->email= $email;
	}

	//website
	public function getWebsite()
	{
		return $this->website;
	}
	public function setWebsite($website)
	{
		 $this->website= $website;
	}

	//banner property
	public function getBanner()
	{
		return $this->banner;
	}

	public function setBanner($banner)
	{
		 $this->banner= $banner;
	}

	//description property
	public function getDescription()
	{
		return $this->description;
	}
	public function setDescription($description)
	{
		 $this->description= $description;
	}

	//category1_id property
	public function getCategory1Id()
	{
		return $this->category1_id;
	}
	public function setCategory1Id($category1_id)
	{
		 $this->category1_id= $category1_id;
	}

	//category2_id poperty
	public function getCategory2Id()
	{
		return $this->category2_id;
	}
	public function setCategory2Id($category2_id)
	{
		 $this->category2_id= $category2_id;
	}

	//category3_id property
	public function getCategory3Id()
	{
		return $this->category3_id;
	}

	public function setCategory3Id($category3_id)
	{
		 $this->category3_id= $category3_id;
	}

	//subcategory1_id property
	public function getSubCategory1Id()
	{
		return $this->subcategory1_id;
	}
	public function setSubCategory1Id($subcategory1_id)
	{
		 $this->subcategory1_id= $subcategory1_id;
	}

	//subcategory2_id poperty
	public function getSubCategory2Id()
	{
		return $this->subcategory2_id;
	}
	public function setSubCategory2Id($subcategory2_id)
	{
		 $this->subcategory2_id= $subcategory2_id;
	}

	//subcategory3_id property
	public function getSubCategory3Id()
	{
		return $this->subcategory3_id;
	}
	public function setSubCategory3Id($subcategory3_id)
	{
		 $this->subcategory3_id= $subcategory3_id;
	}
	
}
?>