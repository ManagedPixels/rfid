class CreateAttendees < ActiveRecord::Migration
  def change
    create_table :attendees do |t|
      t.string :card_number
      t.string :first_name
      t.string :last_name
      t.string :middle_name
      t.string :title
      t.references :org, index: true
      t.string :email
      t.string :card_type

      t.timestamps
    end
  end
end
