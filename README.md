## JSON POST with Codeigniter

My experience has been that when dealing with front end frameworks, Codeigniter's handling of the POST data they send is awful. 
This is an extraordinarily simple Codeigniter library which cleans up a little of the mess. 

#### Setup:

 * Add the library file to /application/libraries
 * Load as required:

 	$this->load->library('json');
	
#### Usage

##### for PHP arrays:

	$this->json->post();
	//returns multimensional PHP array based on whatever JSON is passed in via post

##### for raw strings

	$this->json->rawPost();
	//returns string

