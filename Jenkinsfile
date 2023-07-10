pipeline {
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
                sh " sudo docker build /home/ubuntu/jenkins/workspace/job101-pipline -t omar2023/job101:latest "
            }
        }

        stage('Post Build'){
    //create new image from the cuurent one (job101:latest) to push it to dockerhub
           steps{
                     
                   echo 'Post Buidl Proccessing ......'
                   sh '''  
		   docker rm job101 -f 
                   sudo docker run  --name job101 -it -p 82:80 -d omar2023/job101:latest
		 
                   
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
                sh '''
                echo "server upodated"
		docker push omar2023/job101:latest
                '''
            }
        }
    }
}
