pipeline {

	// where to put all general variables and Jenkins environment variables 
	environment {
    registry = "omar2023/job101"
    registryCredential = credentials('dkh2023')
    dockerImage = "$registry:${BUILD_NUMBER}-${JOB_NAME}"
		
  }
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
      stage('Setup parameters') {
            steps {
                script { 
                    properties([
			    // predefined Jenkins pipeline parameters (string type )
                        parameters([
                            string(
                                defaultValue: 'ls -a', 
                                name: 'COMMAND', 
                                trim: false
                            )
                        ])
                    ])
                }
            }
        }
        stage('Building....') {
            steps {
                echo "Building..."
		    // build docker image from docker file injecting source code 
            // first command to update dockerimage value with the new one
            // second command removes all running container , networks and images (from docker compose only)
            // third one create new ones
                     sh '''
                     
		             sed -i.bak "s|dockerImage|${dockerImage}|g" docker-compose.yaml
                     	docker-compose -f docker-compose.yaml down  
                  	    docker-compose -f docker-compose.yaml up -d  
 
          			'''
		    
            }
        }

        stage('Post Build'){
    //create a new image from the current one (job101:latest) to push it to the docker hub
           steps{
                     
                   echo 'Post Buidl Proccessing ......'
                  sh "docker exec job101 ${params.COMMAND}"
		}
        }
	 stage('Clean Environment ....'){
            steps {
          echo "Environment Cleaning Process....."

		    //Delete all unnecessary resources 
            sh '''
               docker system prune -f
            '''
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
                sh '''
		echo $registryCredential_PSW | docker login -u $registryCredential_USR --password-stdin
		docker push ${dockerImage}
                docker logout
  		'''
            }
        }
    }
}
