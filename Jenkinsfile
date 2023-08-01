pipeline {

	// where to put all general variables and Jenkins environment variables 
	
    agent { 
	    // which server to deploy on
         node {
            label 'testing-mail'
         }
      }
    triggers {
        pollSCM '* * * * *'
    }
    stages {
   
        stage('Building....') {
            steps {
                echo "Building..."
	
            }
        }

        stage('Post Build'){
    //create a new image from the current one (job101:latest) to push it to the docker hub
           steps{
                     
                   echo 'Post Buidl Proccessing ......'
              
		}
        }
	 stage('Clean Environment ....'){
            steps {
          echo "Environment Cleaning Process....."

		    //Delete all unnecessary resources 
          
            }
        }
        stage('Testing ....') {
            steps {
                echo "Testing.."
		    //Open the running application container and execute this command  
               
            }
        }
        stage('Deploying ...') {
		//Push the new tag image to the docker hub
            steps {
                echo 'Deliver....'
                //Get docker hub credentials and log in to the docker hub account then push the image to the repo
              
            }
        }
    }
}
