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
                sudo docker build /home/ubuntu/jenkins/workspace/job101-pipline -t job101
                sudo docker run  --name job101 -it -p 82:80 -d job101
                '''
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
