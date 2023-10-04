pipeline {

	// where to put all general variables and Jenkins environment variables 
	environment {
    registry = "omar2023/lara101"
    registryCredential = credentials('dkh2023')
    dockerImage = "$registry:${GIT_COMMIT}-${JOB_NAME}"	
  }
    agent any
	   
      
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
                                defaultValue: 'service nginx start', 
                                name: 'COMMAND', 
                                trim: false
                            ),
                            booleanParam(
                                defaultValue:false,
                                name:'CLEAN_ENV',
                                description:''
                            ),
                            booleanParam(
                                defaultValue:true,
                                name:'DKH_PUSH',
                                description:''
                            )
                        ])
                    ])
                }
            }
        }
        stage('Building Docker Image....') {
            steps {
                echo "Building..."
		    // build docker image from docker file injecting source code 
            // first command to update dockerimage value with the new one
            // second command removes all running container , networks and images (from docker compose only)
            // third one create new ones
                     sh '''
                     
		                sed -i.bak "s|dockerImage|${dockerImage}|g" docker-compose.yml  
                        sed -i.bak "s|containerName|${BUILD_NUMBER}-lara101-app|g" docker-compose.yml  
                  	    docker-compose -f docker-compose.yml build   
 
          			'''
		    
            }
        }

        stage('Deploying App Container (K8S) ... '){
    //create a new image from the current one (job101:latest) to push it to the docker hub
    // add checker to check whether need to run this command or not
      //  docker-compose -f docker-compose.yml up -d
           steps{
                     
                   echo 'Post Buidl Proccessing ......'
                   
                  sh '''
                   sed -i "s,IMAGE_TAG,${dockerImage}," deployment.yaml
                    kubectl apply -f deployment.yaml
                   
                  '''
                  sh "kubectl exec k8sapp-deployment-0 ${params.COMMAND}"
		}
        }
        
	
      
        stage('push to DKH ...') {
		//Push the new tag image to the docker hub
          when{
          expression{
            params.DKH_PUSH
          }
       }
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

         stage('Clean Environment ....'){
             when{
          expression{
            params.CLEAN_ENV
          }
       }
            steps {
          echo "Environment Cleaning Process....."

		    //Delete all unnecessary resources 
            sh '''
            
               docker system prune -a -f
            '''
            }
        }
    }
}
