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
               docker rm job101 -f
               docker system prune -f
            '''
            }
        }
        stage('Building....') {
            steps {
                echo "Building..."
                sh '''
                sudo docker build /home/ubuntu/jenkins/workspace/job101-pipline -t job102
                sudo docker run  --name job101 -it -p 82:80 -d job102
                '''
            }
        }

        stage('Post Build'){

           steps{
                     
                   echo 'Post Buidl Proccessing ......'
                   sh "cp README.md README.md.backup"
		}
        }
        stage('Testing ....') {
            steps {
                echo "Testing.."
               
            }
        }
        stage('Deploying ...') {
            steps {
                echo 'Deliver....'
                sh '''
                echo "server upodated"
                '''
            }
        }
    }
}
