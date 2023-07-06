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
        stage('Clean Environment ....'){
            steps {
          echo "Environment Cleaning Process....."
            sh '''
               docker system prune -f
            '''
            }
        }
        stage('Building....') {
            steps {
                echo "Building..."
                sh " sudo docker build /home/ubuntu/jenkins/workspace/job101-pipline -t job101 "
            }
        }

        stage('Post Build'){
    //create new image from the cuurent one (job101:latest) to push it to dockerhub
           steps{
                     
                   echo 'Post Buidl Proccessing ......'
                   sh '''  
		   docker rm job101 -f 
                   sudo docker run  --name job101 -it -p 82:80 -d nginx/job101
		   docker tag nginx/job101:latest omar2023/job101:latest
                   
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
