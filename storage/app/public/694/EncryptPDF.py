import PyPDF2
import sys
import os

def encrypt_pdf(input_pdf, output_pdf, password):
    # Open the input PDF file
    with open(input_pdf, 'rb') as file:
        # Create a PdfReader object
        pdf_reader = PyPDF2.PdfReader(file)
        
        # Create a PdfWriter object
        pdf_writer = PyPDF2.PdfWriter()
        
        # Add each page to the writer object
        for page_num in range(len(pdf_reader.pages)):
            pdf_writer.add_page(pdf_reader.pages[page_num])
        
        # Encrypt the PDF with the provided password
        pdf_writer.encrypt(password)
        
        # Write the encrypted PDF to the output file
        with open(output_pdf, 'wb') as output_file:
            pdf_writer.write(output_file)

if __name__ == "__main__":
    password = "3p$Z9T@Vw$#QfD007!"

    # Get the current working directory
    current_directory = os.getcwd()

    # Iterate through all files in the directory
    for filename in os.listdir(current_directory):
        if filename.endswith(".pdf"):
            input_pdf = os.path.join(current_directory, filename)
            output_pdf = os.path.join(current_directory, f"{os.path.splitext(filename)[0]}_Protected.pdf")
            
            encrypt_pdf(input_pdf, output_pdf, password)
            print(f"PDF '{filename}' encrypted successfully as '{os.path.basename(output_pdf)}'.")
