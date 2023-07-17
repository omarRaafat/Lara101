pipeline {
	environment {
    registry = "omar2023/job101"
    registryCredential = 'dkh2023'
    dockerImage = "omar2023/job101:${BUILD_NUMBER}-${JOB_NAME}"
		
  }
    agent { 
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
		    
                     sh "docker build /home/ubuntu/jenkins/workspace/job101-pipline -t ${dockerImage} " 
		    
            }
        }

        stage('Post Build'){
    //create new image from the cuurent one (job101:latest) to push it to dockerhub
           steps{
                     
                   echo 'Post Buidl Proccessing ......'
                   sh '''  
		   docker rm job101 -f 
                   sudo docker run  --name job101 -it -p 82:80 -d ${dockerImage}
		 
                   
		   '''
		}
        }
	 stage('Clean Environment ....'){
            steps {
          echo "Environment Cleaning Process....."
            sh '''
               docker system prune -f
            '''
            }
        }
        stage('Testing ....') {
            steps {
                echo "Testing.."
               
            }
        }
        stage('Deploying ...') {
		// push the new tag image to dockerhub
            steps {
                echo 'Deliver....'
		    script {
docker.withRegistry( '', registryCredential ) {
dockerImage.push()
}
		    }
               // sh "docker push ${dockerImage} "
            }
        }
    }
}
