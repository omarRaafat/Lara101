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
        stage('Build') {
            steps {
                echo "Building..."
                sh '''
                docker rm job101 -f
                docker system prune -f
                sudo docker build /home/ubuntu/jenkins/workspace/job101-pipline -t job101
                sudo docker run  --name job101 -it -p 82:80 -d job101
                '''
            }
        }
        stage('Test') {
            steps {
                echo "Testing.."
               
            }
        }
        stage('Deliver') {
            steps {
                echo 'Deliver....'
                sh '''
                echo "server upodated"
                '''
            }
        }
    }
}
